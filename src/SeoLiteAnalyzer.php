<?php

namespace Seo;

use Vamshop\Core\Utility\StringConverter;

class SeoAnalyzer
{
    public function analyze($text)
    {
        $params = ['content' => $text];
        $analyzer = new \colossal_mind_mb_keyword_gen($params);
        $keywords = $analyzer->get_keywords();

        $para = trim(html_entity_decode($text, ENT_QUOTES, 'UTF-8'));

        $description = (new StringConverter())->firstPara($para);

        return compact('keywords', 'description');
    }
}
