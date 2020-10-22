<?php

namespace App\Http\Controllers;

use App\Models\Star;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     * 當天日期
     * 星座名稱
     * 整體運勢的評分及說明
     * 愛情運勢的評分及說明
     * 事業運勢的評分及說明
     * 財運運勢的評分及說明
     * @return void
     */
    public function index()
    {
        $opts = [
            "ssl" => array(
                'ciphers' => 'DEFAULT:!DH',
            ),
            "https" => [
                "method" => "GET",
            ]
        ];
        $stars_url = array(
            '水瓶座' => 'https://astro.click108.com.tw/daily_10.php?iAstro=10',
            '雙魚座' => 'https://astro.click108.com.tw/daily_11.php?iAstro=11',
            '牡羊座' => 'https://astro.click108.com.tw/daily_0.php?iAstro=0',
            '金牛座' => 'https://astro.click108.com.tw/daily_1.php?iAstro=1',
            '雙子座' => 'https://astro.click108.com.tw/daily_2.php?iAstro=2',
            '巨蟹座' => 'https://astro.click108.com.tw/daily_3.php?iAstro=3',
            '獅子座' => 'https://astro.click108.com.tw/daily_4.php?iAstro=4',
            '處女座' => 'https://astro.click108.com.tw/daily_5.php?iAstro=5',
            '天秤座' => 'https://astro.click108.com.tw/daily_6.php?iAstro=6',
            '天蠍座' => 'https://astro.click108.com.tw/daily_7.php?iAstro=7',
            '射手座' => 'https://astro.click108.com.tw/daily_8.php?iAstro=8',
            '摩羯座' => 'https://astro.click108.com.tw/daily_9.php?iAstro=9'
        );

        foreach ($stars_url as $star_name => $url) {
            $context = stream_context_create($opts);
            $html = file_get_contents($url, false, $context);
            $crawler = new Crawler($html);
            $website_date = $crawler->filter('#iAcDay > option[selected]')->text();

            $star = new Star;
            $star->star_name = $star_name;
            $star->website_date = $website_date;


            $content = $crawler->filter('.TODAY_CONTENT');
            $content->each(function (Crawler $node, $i) use ($star) {
                $star->total_fortune_score = substr_count($node->filter('.txt_green')->text(),'★');
                $star->total_fortune_desc = $node->filter('.txt_green')->parents()->nextAll()->text();
                $star->love_fortune_score = substr_count($node->filter('.txt_pink')->text(),'★');
                $star->love_fortune_desc = $node->filter('.txt_pink')->parents()->nextAll()->text();
                $star->career_fortune_score = substr_count($node->filter('.txt_blue')->text(),'★');
                $star->career_fortune_desc = $node->filter('.txt_blue')->parents()->nextAll()->text();
                $star->wealth_fortune_score = substr_count($node->filter('.txt_orange')->text(),'★');
                $star->wealth_fortune_desc = $node->filter('.txt_orange')->parents()->nextAll()->text();
            });

            $record = Star::where([ ['star_name','=',$star->star_name],['website_date','=',$star->website_date] ]);

            if ($record->exists()) {
                echo 'record exists <br>';
                $record->update($star->toArray());
            } else {
                echo 'record not exists <br>';
                $star->save();
            }

            # print data
            echo $star->star_name, '<br>';
            echo $star->website_date, '<br>';
            echo $star->total_fortune_score, '<br>';
            echo $star->total_fortune_desc, '<br>';
            echo $star->love_fortune_score, '<br>';
            echo $star->love_fortune_desc, '<br>';
            echo $star->career_fortune_score, '<br>';
            echo $star->career_fortune_desc, '<br>';
            echo $star->wealth_fortune_score, '<br>';
            echo $star->wealth_fortune_desc, '<br><br>';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function show(Star $star)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function edit(Star $star)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Star $star)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function destroy(Star $star)
    {
        //
    }
}
