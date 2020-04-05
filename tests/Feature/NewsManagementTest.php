<?php

namespace Tests\Feature;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class NewsManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

//        $this->withoutExceptionHandling();

        Storage::fake('news');
    }

    /** @test */
    public function news_can_be_created_without_image(): void
    {
//        $response = $this->post(route('news.store'), array_merge($this->data(), ['alias' => '']));
//        $response = $this->post(route('news.store'), array_merge($this->data(), ['image' => '']));
        $response = $this->post(route('news.store'), $this->data());

        $this->assertEquals(1, News::count());

        $news = News::first();

        $this->assertEquals($this->data()['title'], $news->title);
        $this->assertEquals($this->data()['announcement'], $news->announcement);
        $this->assertEquals($this->data()['body'], $news->body);
        $this->assertEquals($this->data()['meta_title'], $news->meta_title);
        $this->assertEquals($this->data()['meta_description'], $news->meta_description);
        $this->assertEquals($this->data()['alias'], $news->alias);
        $this->assertEquals($this->data()['published'], $news->published);
        $response->assertRedirect(route('news.index'));
    }

    /** @test */
    public function news_can_be_created_with_image(): void
    {
        $file = UploadedFile::fake()->image('image.jpg');

        $response = $this->post(route('news.store'), array_merge($this->data(), ['image' => $file]));

        $news = News::first();

        $imagePath = '/' . $news->id . '/' . $file->name;
        Storage::disk('news')->assertExists($imagePath);
        $news->delete();
//        $news->deleteMedia($news->media());
        Storage::disk('news')->assertMissing($imagePath);
    }

    /** @test */
    public function news_image_can_be_updated_and_news_has_not_media(): void
    {
        $response = $this->post(route('news.store'), $this->data());
        $this->assertEquals(1, News::count());
        $news = News::first();

        $file = UploadedFile::fake()->image('image.jpg');
        $response = $this->patch(route('news.update', $news), array_merge($this->data(), ['image' => $file]));
        $news->refresh();

        $imagePath = '/' . $news->id . '/' . $file->name;
        Storage::disk('news')->assertExists($imagePath);

        $news->delete();
        Storage::disk('news')->assertMissing($imagePath);
    }

    /** @test */
    public function news_image_can_be_updated_and_news_has_media(): void
    {
        $file = UploadedFile::fake()->image('image.jpg');
        $response = $this->post(route('news.store'), array_merge($this->data(), ['image' => $file]));
        $this->assertEquals(1, News::count());
        $news = News::first();
//        dd($news->media);

        $imagePath = '/' . $news->id . '/' . $file->name;
        Storage::disk('news')->assertExists($imagePath);

        $file1 = UploadedFile::fake()->image('image1.jpg');
        $response = $this->patch(route('news.update', $news), array_merge($this->data(), ['image' => $file1]));
        $news->refresh();

        $this->assertEquals('image1', $news->getFirstMedia('news-image')->name);
        $imagePath1 = '/2/' . $file1->name;
        Storage::disk('news')->assertExists($imagePath1);

        $news->delete();
//        $news->deleteMedia($news->media());
        Storage::disk('news')->assertMissing($imagePath);
    }

    /** @test */
    public function news_title_is_required(): void
    {
        $response = $this->post(route('news.store', array_merge($this->data(), [ 'title' => ''])));

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function news_body_is_required(): void
    {
        $response = $this->post(route('news.store', array_merge($this->data(), [ 'body' => ''])));

        $response->assertSessionHasErrors('body');
    }

    /** @test */
    public function news_meta_title_is_required(): void
    {
        $response = $this->post(route('news.store', array_merge($this->data(), [ 'meta_title' => ''])));

        $response->assertSessionHasErrors('meta_title');
    }

    /** @test */
    public function news_meta_title_must_be_uniq(): void
    {
        $response = $this->post(route('news.store', $this->data()));

        $this->assertEquals(1, News::count());

        $response = $this->post(route('news.store', array_merge($this->data1(), [ 'meta_title' => $this->data()['meta_title']])));

        $response->assertSessionHasErrors('meta_title');
    }

    /** @test */
    public function news_meta_description_is_required(): void
    {
        $response = $this->post(route('news.store', array_merge($this->data(), [ 'meta_description' => ''])));

        $response->assertSessionHasErrors('meta_description');
    }

    /** @test */
    public function news_alias_must_be_set(): void
    {
        $response = $this->post(route('news.store', array_merge($this->data(), [ 'alias' => ''])));

        $this->assertEquals(1, News::count());

        $news = News::first();

        $this->assertEquals(Str::slug($this->data()['alias']), $news->alias);
    }

    /** @test */
    public function news_alias_must_be_uniq(): void
    {
        $response = $this->post(route('news.store', $this->data()));

        $this->assertEquals(1, News::count());

        $response = $this->post(route('news.store', array_merge($this->data1(), [ 'alias' => $this->data()['alias']])));

        $response->assertSessionHasErrors('alias');
    }

    /** @test */
    public function news_published_is_required(): void
    {
        $response = $this->post(route('news.store', array_merge($this->data(), [ 'published' => ''])));

        $response->assertSessionHasErrors('published');
    }

    /** @test */
    public function news_all_can_be_updated(): void
    {
        $this->post(route('news.store'), $this->data());

        $this->assertEquals(1, News::count());

        $news = News::first();
//        dump($news);

        $response = $this->patch(route('news.update', $news->id), $this->data1());
        // получаем измененную запись
        $news->refresh();
//        dump($news);

        $this->assertEquals($this->data1()['title'], $news->title);
        $this->assertEquals($this->data1()['announcement'], $news->announcement);
        $this->assertEquals($this->data1()['body'], $news->body);
//        $this->assertEquals($this->data1()['image'], $news->image);
        $this->assertEquals($this->data1()['meta_title'], $news->meta_title);
        $this->assertEquals($this->data1()['meta_description'], $news->meta_description);
        $this->assertEquals($this->data1()['alias'], $news->alias);
        $this->assertEquals($this->data1()['published'], $news->published);
        $response->assertRedirect(route('news.index'));
    }

    /** @test */
    public function news_meta_title_only_can_be_updated(): void
    {
        $this->post(route('news.store'), $this->data());

        $this->assertEquals(1, News::count());

        $news = News::first();
//        dump($news);

        $response = $this->patch(route('news.update', $news->id), array_merge($this->data(), ['meta_title' => $this->data1()['meta_title']]));
        // получаем измененную запись
        $news->refresh();
//        dump($news);

        $this->assertEquals($this->data()['title'], $news->title);
        $this->assertEquals($this->data()['announcement'], $news->announcement);
        $this->assertEquals($this->data()['body'], $news->body);
//        $this->assertEquals($this->data()['image'], $news->image);
        $this->assertEquals($this->data1()['meta_title'], $news->meta_title);
        $this->assertEquals($this->data()['meta_description'], $news->meta_description);
        $this->assertEquals($this->data()['alias'], $news->alias);
        $this->assertEquals($this->data()['published'], $news->published);
        $response->assertRedirect(route('news.index'));
    }

    /** @test */
    public function news_alias_only_can_be_updated(): void
    {
        $this->post(route('news.store'), $this->data());

        $this->assertEquals(1, News::count());

        $news = News::first();
//        dump($news);

        $response = $this->patch(route('news.update', $news->id), array_merge($this->data(), ['alias' => $this->data1()['alias']]));
        // получаем измененную запись
        $news->refresh();
//        dump($news);

        $this->assertEquals($this->data()['title'], $news->title);
        $this->assertEquals($this->data()['announcement'], $news->announcement);
        $this->assertEquals($this->data()['body'], $news->body);
//        $this->assertEquals($this->data()['image'], $news->image);
        $this->assertEquals($this->data()['meta_title'], $news->meta_title);
        $this->assertEquals($this->data()['meta_description'], $news->meta_description);
        $this->assertEquals($this->data1()['alias'], $news->alias);
        $this->assertEquals($this->data()['published'], $news->published);
        $response->assertRedirect(route('news.index'));
    }

    /** @test */
    public function news_can_be_deleted(): void
    {
        // Создаем запись
        $this->post(route('news.store'), $this->data());
        // Проверяем наличие 1 записи в БД
        $this->assertEquals(1, News::count());
        // Получаем созданную запись из БД
        $news = News::first();
        // Удаляем созданную запись
        $response = $this->delete(route('news.destroy', $news->id));
        // Проверяем отстутствие записей в БД
        $this->assertEquals(0, News::count());
        // Проверяем редирект на index
        $response->assertRedirect(route('news.index'));
    }

    protected function data(): array
    {
        return [
          'title' => 'News title',
          'announcement' => 'News announcement',
          'body' => 'News body',
//          'image' => $file = UploadedFile::fake()->image('image.jpg', 1, 1),
          'meta_title' => 'News meta title',
          'meta_description' => 'News meta description',
          'alias' => 'news-title',
          'published' => false,
        ];
    }

    protected function data1(): array
    {
        return [
          'title' => 'News title 1',
          'announcement' => 'News announcement 1',
          'body' => 'News body 1',
//          'image' => $file = UploadedFile::fake()->image('image1.jpg', 1, 1),
          'meta_title' => 'News meta title 1',
          'meta_description' => 'News meta description 1',
          'alias' => 'news-title-1',
          'published' => true,
        ];
    }
}
