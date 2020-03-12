<?php

namespace Tests\Feature;

use App\Enums\Countries;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManufacturerManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function manufacturer_can_be_created(): void
    {
        $response = $this->post(route('manufacturers.store'), $this->data());

        $manufacturer = Manufacturer::first();

        $this->assertCount(1, Manufacturer::all());
        $this->assertEquals($this->data()['name'], $manufacturer->name);
        $this->assertEquals($this->data()['country'], $manufacturer->country);
        $response->assertRedirect(route('manufacturers.index'));
    }

    /** @test */
    public function manufacturer_name_is_required(): void
    {
        $response = $this->post(route('manufacturers.store'), array_merge($this->data(), ['name' => '']));

        $response->assertSessionHasErrors('name');
    }

    /** @test */
/*    public function manufacturer_name_must_be_unique(): void
    {
        $this->post(route('manufacturers.store'), $this->data());

        $manufacturer = Manufacturer::all();
        $this->assertCount(1, $manufacturer);

        $response = $this->post(route('manufacturers.store'), $this->data());
        $response->assertSessionHasErrors('name');
    }*/


    /** @test */
    public function manufacturer_country_is_required(): void
    {
        $response = $this->post(route('manufacturers.store'), array_merge($this->data(), ['country' => '']));

        $response->assertSessionHasErrors('country');
    }

    /** @test */
    public function manufacturer_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        // создаем запись
        $this->post(route('manufacturers.store'), $this->data());
        // сохраняем ее в переменной
        /** @var Manufacturer $manufacturer */
        $manufacturer = Manufacturer::first();
        // изменяем запись
        $response = $this->patch(route('manufacturers.update', $manufacturer), $this->newData());
        // получаем измененную запись
        $manufacturer->refresh();
//        dd($manufacturer);
        // проверяем результат
        $this->assertEquals($this->newData()['name'], $manufacturer->name);
        $this->assertEquals($this->newData()['country'], $manufacturer->country);
        $response->assertRedirect(route('manufacturers.index'));
    }

    /** @test */
    public function manufacturer_can_be_deleted(): void
    {
//        $this->withoutExceptionHandling();
        // Создаем запись
        $this->post(route('manufacturers.store'), $this->data());
        // Проверяем наличие 1 записи в БД
        $this->assertCount(1, Manufacturer::all());
        // Получаем созданную запись из БД
        $manufacturer = Manufacturer::first();
        // Удаляем созданную запись
        $response = $this->delete(route('manufacturers.destroy', $manufacturer));
        // Проверяем отстутствие записей в БД
        $this->assertCount(0, Manufacturer::all());
        // Проверяем редирект на index
        $response->assertRedirect(route('manufacturers.index'));
    }

    /** @test */
    public function manufacturer_can_has_fullname_attribute(): void
    {
        // Создаем запись
        $this->post(route('manufacturers.store'), $this->data());
        // Проверяем наличие 1 записи в БД
        $this->assertCount(1, Manufacturer::all());
        // Получаем созданную запись из БД
        $manufacturer = Manufacturer::first();

        $expectedValue = $manufacturer->name . ' / ' . $manufacturer->country;
        $this->assertEquals($expectedValue, $manufacturer->fullName);
    }

    private function data(): array
    {
        return [
            'name' => 'Производитель',
            'country' => Countries::RU,
        ];
    }

    private function newData(): array
    {
        return [
            'name' => 'Новое имя производителя',
            'country' => Countries::DE,
        ];
    }
}
