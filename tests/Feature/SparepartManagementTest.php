<?php

namespace Tests\Feature;

use App\Models\Manufacturer;
use App\Models\Sparepart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SparepartManagementTest extends TestCase
{
    use RefreshDatabase;

    protected $manufacturer;

    protected function setUp(): void
    {
        parent::setUp();

        factory(Manufacturer::class)->create();
        $this->assertCount(1, Manufacturer::all());
        $this->manufacturer = Manufacturer::first();
    }

    /** @test */
    public function sparepart_can_be_created(): void
    {
//        $this->withoutExceptionHandling();
//        $fake = \Storage::fake('public');
//        $fakeImage = UploadedFile::fake()->image('image.jpg', 1, 1);
//        dd($fakeImage);

        $response = $this->post(route('spareparts.store'), $this->data());
//        $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['image' => $fakeImage]));

        $sparepart = Sparepart::first();
//        dump($sparepart);

//        $imagePath = $fakeImage->hashName();
//        dd($fakeImage->hashName());

        $this->assertEquals(1, Sparepart::count());
        $this->assertEquals($this->data()['title'], $sparepart->title);
        $this->assertEquals($this->data()['subtitle'], $sparepart->subtitle);
        $this->assertEquals($this->data()['synonyms'], $sparepart->synonyms);
        $this->assertEquals($this->data()['manufacturer_id'], $this->manufacturer->id);
        $this->assertEquals($this->data()['image'], $sparepart->image);
//        $this->assertEquals($fakeImage, $sparepart->image);
//        \Storage::assertExists($fakeImage);
        $this->assertEquals($this->data()['code'], $sparepart->code);
        $this->assertEquals($this->data()['vendor_code'], $sparepart->vendor_code);
        $this->assertEquals($this->data()['original_code'], $sparepart->original_code);
        $this->assertEquals((int)$this->data()['is_special'], $sparepart->is_special);
        $this->assertEquals((int)$this->data()['is_original'], $sparepart->is_original);
        $this->assertEquals((int)$this->data()['is_by_order'], $sparepart->is_by_order);
    }

    /** @test */
    public function sparepart_title_is_required(): void
    {
        $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['title' => '']));

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function sparepart_manufacturer_id_is_required(): void
    {
        $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['manufacturer_id' => '']));

        $response->assertSessionHasErrors('manufacturer_id');
    }

    /** @test */
    public function sparepart_must_have_manufacturer(): void
    {
        // Создаем запись
        $response = $this->post(route('spareparts.store'), $this->data());
        // Проверяем наличие одной записи в БД
        $this->assertEquals(1, Sparepart::count());
        //
        $sparepart = Sparepart::first();

        $this->assertEquals($this->manufacturer->name, $sparepart->manufacturer->name);
    }

    /** @test */
    public function sparepart_must_have_manufacturer_full_name(): void
    {
        // Создаем запись
        $response = $this->post(route('spareparts.store'), $this->data());
        // Проверяем наличие одной записи в БД
        $this->assertEquals(1, Sparepart::count());
        // Получаем первую запись из БД
        $sparepart = Sparepart::first();
        // Проверяем соответствие
        $this->assertEquals($this->manufacturer->fullName, $sparepart->manufacturer->fullName);
    }

    /** @test */
    public function sparepart_code_is_required(): void
    {
        $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['code' => '']));

        $response->assertSessionHasErrors('code');
    }

    /** @test */
    public function sparepart_code_must_be_unique(): void
    {
        // Создаем одну запись по умолчанию
        $response = $this->post(route('spareparts.store'), $this->data());
        // Проверяем наличие одной записи в БД
        $this->assertCount(1, Sparepart::all());
        // Пытаемся создать вторую запись с тем-же code
        $response = $this->post(route('spareparts.store'), $this->data());
        // Проверяем на ошибку
        $response->assertSessionHasErrors('code');
    }

    /** @test */
    public function sparepart_code_must_have_size_5(): void
    {
        // Создаем запись c длиной code = 4
        $response = $this->post(route('spareparts.store'), array_merge($this->data(), $this->codeShort()));
        // Проверяем на ошибку
        $response->assertSessionHasErrors('code');
        // Создаем запись c длиной code = 6
        $response = $this->post(route('spareparts.store'), array_merge($this->data(), $this->codeLong()));
        // Проверяем на ошибку
        $response->assertSessionHasErrors('code');
    }

    /** @test */
    public function sparepart_vendor_code_must_have_only_allowed_characters(): void
    {
        $vendorCodesSet = $this->vendorCodesWrong();
        // создаем в цикле записи и проверяем их на ошибку
        foreach ($vendorCodesSet as $vendorCode) {
            $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['vendor_code' => $vendorCode]));
            // Проверяем на ошибку
            $response->assertSessionHasErrors('vendor_code');
        }
    }

    /** @test */
    public function sparepart_original_code_must_have_only_allowed_characters(): void
    {
        $originalCodesSet = $this->originalCodesWrong();
        // создаем в цикле записи и проверяем их на ошибку
        foreach ($originalCodesSet as $originalCode) {
            $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['original_code' => $originalCode]));
            // Проверяем на ошибку
            $response->assertSessionHasErrors('original_code');
        }
    }

    /** @test */
    public function sparepart_is_special_is_required(): void
    {
        $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['is_special' => '']));

        $response->assertSessionHasErrors('is_special');
    }

    /** @test */
    public function sparepart_is_original_is_required(): void
    {
        $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['is_original' => '']));

        $response->assertSessionHasErrors('is_original');
    }

    /** @test */
    public function sparepart_is_by_order_is_required(): void
    {
        $response = $this->post(route('spareparts.store'), array_merge($this->data(), ['is_by_order' => '']));

        $response->assertSessionHasErrors('is_by_order');
    }


    private function data(): array
    {
        return [
            'title' => 'Название запчасти',
            'subtitle' => 'Подзаголовок',
            'synonyms' => 'Синоним1,Синоним2,Синоним3',
            'manufacturer_id' => $this->manufacturer->id,
            'image' => 'image.jpg',
//            'image' => $file = UploadedFile::fake()->image('image.jpg', 1, 1),
            'code' => '01234',
//            'vendor_code' => 'aBcаБв123- ,',
            'vendor_code' => '',
            'original_code' => '',
            'is_special' => false,
            'is_original' => false,
            'is_by_order' => false,
        ];
    }

    private function codeShort(): array
    {
        return ['code' => '0123'];
    }

    private function codeLong(): array
    {
        return ['code' => '012345'];
    }

    // Возвращает массив Артикулов с недопустимыми символами
    private function vendorCodesWrong(): array
    {
        return ['aBcаБв123-, @', '012345!', '01_45'];
    }

    // Возвращает массив Кодов оригинала с недопустимыми символами
    private function originalCodesWrong(): array
    {
        return ['aBc123-, @', '012345!', '01_45', 'acd 24Абв'];
    }
}
