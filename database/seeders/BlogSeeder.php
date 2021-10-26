<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::find(1);
        $blog1 = $user1->blogs()->create([
            'title' => 'Lorem Ipsum Dolor Sit Amet',
            'thumbnail' => 'dummy/740x504.jpg',
            'content' => '<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus.Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Rat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Aenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><blockquote>Equidem impedit officiis quo te. Illud partem sententiae mel eu, euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam tibique omittantur duo ut, agam graeci in vim.</blockquote><p>Placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat</p><p>Misl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornartincidunt placerat</p>',
            'publish' => true,
        ]);

        $blog1->categories()->attach(1);
        $blog1->tags()->attach([1, 2, 3]);

        $blog2 = $user1->blogs()->create([
            'title' => 'Aenean Vel Consequat',
            'thumbnail' => 'dummy/740x504.jpg',
            'content' => '<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus.Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Rat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Aenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><blockquote>Equidem impedit officiis quo te. Illud partem sententiae mel eu, euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam tibique omittantur duo ut, agam graeci in vim.</blockquote><p>Placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat</p><p>Misl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornartincidunt placerat</p>',
            'publish' => true,
        ]);

        $blog2->categories()->attach(2);
        $blog2->tags()->attach([1, 2, 3]);

        $user2 = User::find(2);
        $blog3 = $user2->blogs()->create([
            'title' => 'Purus Ornare Tincidunt Enim',
            'thumbnail' => 'dummy/740x504.jpg',
            'content' => '<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus.Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Rat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Aenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><blockquote>Equidem impedit officiis quo te. Illud partem sententiae mel eu, euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam tibique omittantur duo ut, agam graeci in vim.</blockquote><p>Placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat</p><p>Misl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornartincidunt placerat</p>',
            'publish' => true,
        ]);

        $blog3->categories()->attach(2);
        $blog3->tags()->attach([1, 2, 3]);

        $blog4 = $user2->blogs()->create([
            'title' => 'Nisi At Nisl Imperdiet Auctor',
            'thumbnail' => 'dummy/740x504.jpg',
            'content' => '<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus.Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Rat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Aenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><blockquote>Equidem impedit officiis quo te. Illud partem sententiae mel eu, euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam tibique omittantur duo ut, agam graeci in vim.</blockquote><p>Placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat</p><p>Misl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornartincidunt placerat</p>',
            'publish' => true,
        ]);

        $blog4->categories()->attach(2);
        $blog4->tags()->attach([1, 2, 3]);

        $user3 = User::find(3);
        $blog5 = $user3->blogs()->create([
            'title' => 'Est Sed Tincidunt Placerat',
            'thumbnail' => 'dummy/740x504.jpg',
            'content' => '<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus.Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Rat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><p>Aenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat, sem mi suscipit mi, at variuest sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p><blockquote>Equidem impedit officiis quo te. Illud partem sententiae mel eu, euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam tibique omittantur duo ut, agam graeci in vim.</blockquote><p>Placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornare eget. Nunc fa st sed tincidunt placerat</p><p>Misl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra  auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornartincidunt placerat</p>',
            'publish' => true,
        ]);

        $blog5->categories()->attach(2);
        $blog5->tags()->attach([1, 2, 3]);
    }
}
