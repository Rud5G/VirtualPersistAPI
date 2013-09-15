<?php

/* VirtualPersistBundle:Default:regionPrimUse.html.twig */
class __TwigTemplate_602feebe487664882ffe54447bb43fd2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<h2>";
        echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : null), "html", null, true);
        echo "</h2>
<div class=\"content\">
<div id=\"primuse-graph\" data-regionname=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["regionName"]) ? $context["regionName"] : null), "html", null, true);
        echo "\"></div>
<noscript>
<table id=\"primuse-table\" border=\"1\">
    <tr><th>Region</th><th>Count</th><th>Time</th></tr>
    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["records"]) ? $context["records"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
            // line 10
            echo "        <tr>
            <td>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["record"]) ? $context["record"] : null), "getKey"), "html", null, true);
            echo "</td>
            <td>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["record"]) ? $context["record"] : null), "getData"), "html", null, true);
            echo "</td>
            <td>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["record"]) ? $context["record"] : null), "getTimestamp"), "format", array(0 => "Y-m-d H:i:s"), "method"), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "</table>
</div>
</noscript>

";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["records"]) ? $context["records"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
            // line 21
            echo "<div class=\"primuse-data\" data-timestamp=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["record"]) ? $context["record"] : null), "getTimestamp"), "getTimestamp"), "html", null, true);
            // line 23
            echo "\" data-data=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["record"]) ? $context["record"] : null), "getData"), "html", null, true);
            // line 25
            echo "\" style=\"display: none;\">&nbsp;</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "
";
        // line 28
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "4d7307e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4d7307e_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/traffic_jquery.jqplot.min_1.js");
            // line 33
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
            // asset "4d7307e_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4d7307e_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/traffic_jqplot.dateAxisRenderer.min_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
            // asset "4d7307e_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4d7307e_2") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/traffic_part_3_primStats_1.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "4d7307e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4d7307e") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/traffic.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "VirtualPersistBundle:Default:regionPrimUse.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 12,  53 => 5,  47 => 17,  23 => 1,  242 => 75,  232 => 73,  195 => 66,  190 => 64,  181 => 61,  155 => 52,  126 => 43,  70 => 13,  37 => 5,  482 => 4,  476 => 2,  465 => 1,  455 => 173,  445 => 171,  424 => 161,  416 => 158,  401 => 155,  391 => 149,  375 => 141,  367 => 136,  363 => 134,  359 => 132,  356 => 130,  352 => 129,  349 => 126,  347 => 125,  344 => 122,  334 => 114,  326 => 109,  324 => 108,  321 => 106,  319 => 105,  316 => 103,  313 => 101,  311 => 100,  304 => 96,  300 => 93,  281 => 89,  262 => 87,  257 => 84,  255 => 82,  253 => 81,  250 => 79,  238 => 73,  233 => 71,  219 => 64,  216 => 63,  213 => 62,  211 => 61,  200 => 55,  191 => 52,  188 => 51,  185 => 50,  165 => 43,  153 => 51,  150 => 50,  110 => 21,  108 => 20,  96 => 34,  81 => 23,  76 => 20,  59 => 13,  34 => 9,  1819 => 553,  1813 => 552,  1807 => 551,  1801 => 550,  1795 => 549,  1789 => 548,  1783 => 547,  1777 => 546,  1771 => 545,  1755 => 539,  1748 => 538,  1746 => 537,  1743 => 536,  1720 => 532,  1695 => 531,  1693 => 530,  1690 => 529,  1678 => 524,  1674 => 523,  1671 => 522,  1668 => 521,  1665 => 520,  1662 => 519,  1659 => 518,  1657 => 517,  1654 => 516,  1645 => 509,  1642 => 508,  1640 => 507,  1637 => 506,  1628 => 501,  1625 => 500,  1623 => 499,  1620 => 498,  1603 => 494,  1597 => 492,  1594 => 491,  1576 => 490,  1574 => 489,  1571 => 488,  1563 => 482,  1556 => 480,  1553 => 476,  1549 => 475,  1545 => 473,  1540 => 470,  1538 => 466,  1535 => 465,  1532 => 464,  1530 => 463,  1527 => 462,  1520 => 457,  1513 => 455,  1510 => 451,  1506 => 450,  1503 => 449,  1499 => 447,  1496 => 443,  1493 => 442,  1491 => 441,  1488 => 440,  1480 => 436,  1478 => 435,  1475 => 434,  1468 => 429,  1465 => 428,  1458 => 424,  1453 => 423,  1451 => 422,  1448 => 421,  1439 => 415,  1435 => 414,  1431 => 412,  1429 => 411,  1426 => 410,  1418 => 405,  1413 => 404,  1407 => 402,  1404 => 401,  1402 => 397,  1400 => 396,  1397 => 395,  1388 => 389,  1384 => 388,  1379 => 386,  1368 => 385,  1366 => 384,  1363 => 383,  1356 => 380,  1353 => 379,  1345 => 374,  1341 => 373,  1336 => 372,  1330 => 370,  1324 => 368,  1321 => 367,  1319 => 366,  1316 => 365,  1308 => 361,  1306 => 357,  1304 => 356,  1301 => 355,  1292 => 348,  1276 => 347,  1272 => 345,  1269 => 344,  1266 => 343,  1263 => 342,  1260 => 341,  1257 => 340,  1254 => 339,  1251 => 338,  1248 => 337,  1245 => 336,  1242 => 335,  1239 => 334,  1236 => 333,  1234 => 332,  1231 => 331,  1222 => 327,  1206 => 326,  1202 => 324,  1199 => 323,  1196 => 322,  1193 => 321,  1190 => 320,  1187 => 319,  1184 => 318,  1181 => 317,  1178 => 316,  1175 => 315,  1172 => 314,  1169 => 313,  1166 => 312,  1164 => 311,  1161 => 310,  1140 => 306,  1137 => 305,  1134 => 304,  1131 => 303,  1128 => 302,  1125 => 301,  1122 => 300,  1119 => 299,  1116 => 298,  1113 => 297,  1110 => 296,  1107 => 295,  1104 => 294,  1102 => 293,  1099 => 292,  1091 => 286,  1088 => 285,  1086 => 284,  1083 => 283,  1075 => 279,  1072 => 278,  1070 => 277,  1067 => 276,  1059 => 272,  1056 => 271,  1054 => 270,  1051 => 269,  1043 => 265,  1040 => 264,  1038 => 263,  1035 => 262,  1027 => 258,  1024 => 257,  1021 => 256,  1019 => 255,  1016 => 254,  1008 => 250,  1005 => 249,  1003 => 248,  1000 => 247,  992 => 243,  990 => 242,  987 => 241,  979 => 237,  976 => 236,  974 => 235,  971 => 234,  963 => 230,  960 => 229,  958 => 228,  956 => 227,  953 => 226,  946 => 221,  938 => 220,  933 => 219,  927 => 217,  924 => 216,  922 => 215,  919 => 214,  911 => 208,  909 => 207,  908 => 206,  907 => 205,  906 => 204,  901 => 203,  895 => 201,  892 => 200,  890 => 199,  887 => 198,  878 => 192,  874 => 191,  870 => 190,  866 => 189,  861 => 188,  855 => 186,  852 => 185,  850 => 184,  847 => 183,  831 => 179,  829 => 178,  826 => 177,  810 => 173,  808 => 172,  805 => 171,  788 => 167,  776 => 165,  769 => 162,  767 => 161,  762 => 160,  759 => 159,  741 => 158,  739 => 157,  736 => 156,  727 => 151,  724 => 150,  721 => 149,  715 => 147,  713 => 146,  708 => 145,  705 => 144,  702 => 143,  696 => 141,  694 => 140,  686 => 139,  684 => 138,  681 => 137,  669 => 132,  664 => 131,  661 => 130,  659 => 129,  656 => 128,  647 => 123,  641 => 121,  638 => 120,  636 => 119,  633 => 118,  623 => 114,  621 => 113,  618 => 112,  610 => 108,  607 => 107,  604 => 106,  601 => 105,  599 => 104,  596 => 103,  588 => 98,  583 => 97,  577 => 95,  575 => 94,  570 => 93,  568 => 92,  565 => 91,  558 => 86,  552 => 84,  546 => 82,  544 => 81,  538 => 79,  535 => 78,  533 => 77,  530 => 76,  528 => 75,  525 => 74,  516 => 69,  514 => 68,  511 => 67,  505 => 65,  499 => 63,  497 => 62,  493 => 60,  491 => 59,  488 => 58,  481 => 53,  475 => 51,  467 => 48,  458 => 45,  456 => 44,  447 => 41,  441 => 39,  439 => 38,  433 => 35,  421 => 160,  418 => 159,  412 => 26,  395 => 151,  389 => 21,  383 => 145,  377 => 142,  371 => 138,  369 => 14,  366 => 13,  357 => 8,  351 => 6,  348 => 5,  346 => 4,  343 => 3,  339 => 119,  335 => 551,  333 => 550,  331 => 112,  329 => 111,  327 => 547,  325 => 546,  323 => 545,  320 => 544,  317 => 542,  315 => 536,  310 => 529,  307 => 97,  302 => 515,  299 => 513,  297 => 506,  292 => 498,  289 => 497,  287 => 488,  284 => 487,  282 => 462,  279 => 461,  277 => 440,  274 => 439,  272 => 434,  269 => 433,  266 => 431,  261 => 427,  259 => 85,  256 => 420,  254 => 410,  251 => 409,  249 => 395,  246 => 394,  244 => 383,  239 => 379,  236 => 72,  234 => 365,  231 => 364,  226 => 354,  222 => 351,  217 => 70,  215 => 310,  212 => 309,  210 => 292,  207 => 68,  204 => 289,  202 => 283,  197 => 276,  194 => 275,  192 => 269,  184 => 62,  179 => 48,  174 => 46,  172 => 241,  167 => 234,  159 => 41,  157 => 214,  152 => 198,  139 => 176,  137 => 46,  134 => 170,  129 => 44,  127 => 137,  124 => 136,  114 => 117,  104 => 102,  102 => 91,  97 => 74,  84 => 25,  77 => 3,  74 => 20,  480 => 3,  474 => 161,  469 => 49,  461 => 46,  457 => 153,  453 => 43,  444 => 149,  440 => 167,  437 => 166,  435 => 36,  430 => 34,  427 => 162,  423 => 142,  413 => 157,  409 => 25,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 147,  384 => 121,  381 => 144,  379 => 143,  374 => 16,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 120,  337 => 117,  322 => 101,  314 => 99,  312 => 535,  309 => 99,  305 => 516,  298 => 92,  294 => 505,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 88,  258 => 81,  252 => 80,  247 => 78,  241 => 74,  235 => 74,  229 => 355,  224 => 65,  220 => 71,  214 => 69,  208 => 60,  177 => 247,  169 => 240,  143 => 48,  140 => 55,  132 => 156,  128 => 30,  119 => 41,  111 => 39,  107 => 103,  71 => 156,  67 => 15,  61 => 22,  38 => 8,  94 => 28,  89 => 173,  85 => 30,  79 => 28,  75 => 20,  68 => 16,  56 => 78,  50 => 10,  29 => 5,  87 => 34,  72 => 18,  55 => 12,  21 => 2,  26 => 6,  98 => 33,  93 => 9,  88 => 31,  78 => 21,  46 => 9,  27 => 4,  40 => 8,  44 => 9,  35 => 10,  31 => 3,  43 => 8,  41 => 28,  28 => 2,  196 => 54,  183 => 82,  171 => 45,  166 => 55,  163 => 54,  158 => 67,  156 => 40,  151 => 63,  142 => 177,  138 => 34,  136 => 33,  123 => 47,  121 => 26,  117 => 118,  115 => 43,  105 => 15,  101 => 32,  91 => 27,  69 => 155,  66 => 18,  62 => 17,  49 => 16,  24 => 4,  32 => 4,  25 => 3,  22 => 3,  19 => 2,  209 => 82,  203 => 78,  199 => 282,  193 => 65,  189 => 268,  187 => 63,  182 => 49,  176 => 58,  173 => 74,  168 => 56,  164 => 233,  162 => 42,  154 => 213,  149 => 197,  147 => 37,  144 => 36,  141 => 35,  133 => 32,  130 => 31,  125 => 29,  122 => 42,  116 => 24,  112 => 22,  109 => 38,  106 => 37,  103 => 32,  99 => 90,  95 => 28,  92 => 58,  86 => 172,  82 => 29,  80 => 19,  73 => 26,  64 => 23,  60 => 13,  57 => 14,  54 => 11,  51 => 11,  48 => 10,  45 => 14,  42 => 13,  39 => 7,  36 => 14,  33 => 6,  30 => 7,);
    }
}
