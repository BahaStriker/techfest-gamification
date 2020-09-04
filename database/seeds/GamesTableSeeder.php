<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Game1',
                'description' => 'bla bla bla bla',
                'link' => 'http://api.sloth-lab.com/3',
                'type' => 1,
                'thubnail' => 'game1.png',
                'categ_id' => 1,
            ],
            [
                'name' => 'game2',
                'description' => 'bla bla bla bla',
                'link' => 'http://api.sloth-lab.com/4',
                'type' => 1,
                'thubnail' => 'game2.png',
                'categ_id' => 2,
            ],
            [
                'name' => 'game3',
                'description' => 'bla bla bla bla',
                'link' => 'http://api.sloth-lab.com/5',
                'type' => 1,
                'thubnail' => 'game3.png',
                'categ_id' => 2,
            ],
            [
                'name' => 'game4',
                'description' => 'bla bla bla bla',
                'link' => 'https://api.sloth-lab.com/2',
                'type' => 1,
                'thubnail' => 'game4.png',
                'categ_id' => 2,
            ],
            [
                'name' => 'game5',
                'description' => 'bla bla bla bla',
                'link' => 'https://api.sloth-lab.com/1',
                'type' => 1,
                'thubnail' => 'game5.png',
                'categ_id' => 2,
            ],
            [
                'name' => 'game6',
                'description' => 'bla bla bla bla',
                'link' => 'https://emea.iframed.cn.dmti.cloud/content/577/darwins-yearbook/game/ab/darwins-yearbook-ar-20191210.71833a4e/index.html',
                'type' => 1,
                'thubnail' => 'game6.png',
                'categ_id' => 2,
            ],
            [
                'name' => 'game7',
                'description' => 'bla bla bla bla',
                'link' => 'https://emea.iframed.cn.dmti.cloud/content/581/game/omnitrix-glitch/ab/omnitrixglitch-300519-ar/index.html',
                'type' => 1,
                'thubnail' => 'game7.png',
                'categ_id' => 2,
            ],
            [
                'name' => 'game8',
                'description' => 'bla bla bla bla',
                'link' => 'https://emea.iframed.cn.dmti.cloud/content/576/game/%D9%81%D8%B7%D9%8A%D8%B1%D8%A9-%D9%88%D9%85%D8%BA%D8%A7%D9%85%D8%B1%D8%A9-%D8%AE%D8%B7%D9%8A%D8%B1%D8%A9/ab/bakerybravery-080719-ar/index.html',
                'type' => 1,
                'thubnail' => 'game8.png',
                'categ_id' => 2,
            ],
            [
                'name' => 'game9',
                'description' => 'bla bla bla bla',
                'link' => 'https://emea.iframed.cn.dmti.cloud/content/652/game/%D8%A7%D9%84%D8%A7%D9%94%D9%86%D8%B4%D8%B7%D8%A9-%D8%A7%D9%84%D9%8A%D9%88%D9%85%D9%8A%D8%A9/ab/morningmixups_ar_12092017/index.html',
                'type' => 1,
                'thubnail' => 'game9.png',
                'categ_id' => 2,
            ],
            [
                'name' => 'game10',
                'description' => 'bla bla bla bla',
                'link' => 'https://emea.iframed.cn.dmti.cloud/content/923/game/%D9%85%D9%86-%D8%AE%D8%A7%D8%B1%D8%AC-%D8%A7%D9%84%D8%B5%D9%86%D8%AF%D9%88%D9%82/ab/wbb_outofthebox-ar-01032017/index.html',
                'type' => 1,
                'thubnail' => 'game10.png',
                'categ_id' => 2,
            ],

        ];
        foreach ($items as $item) {
            \App\game::create($item);
        }
    }
}
