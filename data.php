<?php
declare(strict_types=1);

/*
 * Site content lives here so it can be edited without touching templates.
 * Source: jabbofthecarolinas.com. Document links point to JABB's current
 * hosted PDFs; swap them for local copies in /public/docs if you prefer.
 */

const JABB_DOCS = 'https://jabbofthecarolinas.com/wp-content/uploads/';

function company(): array
{
    return [
        'phone'     => '919-965-9007',
        'phone_raw' => '9199659007',
        'email'     => 'info@jabbspe.com',
        'street'    => '302 E Brown Street',
        'city'      => 'Pine Level, NC 27568',
        'maps'      => 'https://maps.google.com/maps?q=JABB%20302%20E.%20Brown%20St%20Pine%20Level%2C%20North%20Carolina%2027568',
        'founded'   => 1994,
    ];
}

function products(): array
{
    return [
        [
            'slug'    => 'spe-120-es',
            'name'    => 'SPE-120 ES',
            'market'  => 'Organic',
            'form'    => 'Liquid',
            'short'   => 'Organic liquid Beauveria bassiana for in-furrow, drip irrigation or foliar use.',
            'body'    => 'This organic liquid formulation can be used in-furrow, drip irrigation or foliar applications. Direct contact with the seed is preferred to assure inoculation at germination.',
            'apply'   => 'Apply in-furrow where the product makes contact with the seed. JABB liquids are compatible with most in-furrow starter fertilizers.',
            'docs'    => [
                ['Product label',    JABB_DOCS . '2026/01/2026-SPE-120-120oz.pdf'],
                ['Product label (CA)', JABB_DOCS . '2026/01/SPE-120-CA-label-Website.pdf'],
                ['Safety data sheet', JABB_DOCS . '2025/03/SDS-SPE120-ES.pdf'],
                ['OMRI certificate', JABB_DOCS . '2025/09/SPE-120-ES-OMRI-Cert.-2026.pdf'],
            ],
        ],
        [
            'slug'    => 'spe-120-seed-lubricant',
            'name'    => 'SPE-120 with Seed Lubricant',
            'market'  => 'Organic',
            'form'    => 'Talc and graphite',
            'short'   => 'Beauveria bassiana mixed with OMRI listed talc and graphite for the planter seed box.',
            'body'    => 'Beauveria bassiana mixed with OMRI listed talc and graphite for use in the planter seed box. This formulation replaces the need for separate seed lubricant.',
            'apply'   => 'Add to the planter box in place of seed lubricant. Layer the seed and product, then mix so the seed is fully covered.',
            'docs'    => [
                ['Product label',    JABB_DOCS . '2026/01/2026-SPE-120-with-seed-lubricant-40-ac.pdf'],
                ['Product label (CA)', JABB_DOCS . '2026/01/SPE-120-with-lubricant-CA-label-website.pdf'],
                ['Safety data sheet', JABB_DOCS . '2025/03/SDS-SPE-120-with-lubricant.pdf'],
                ['OMRI certificate', JABB_DOCS . '2025/09/SPE-120-with-lubricant-OMRI-Certificate-2026.pdf'],
            ],
        ],
        [
            'slug'    => 'sbb-2-5-inoculant',
            'name'    => 'SBb 2.5 Inoculant',
            'market'  => 'Conventional',
            'form'    => 'Liquid',
            'short'   => 'Conventional liquid Beauveria bassiana for in-furrow, drip irrigation or foliar use.',
            'body'    => 'This conventional liquid formulation can be used in-furrow, drip irrigation or foliar applications. Direct contact with the seed is preferred to assure inoculation at germination.',
            'apply'   => 'Apply in-furrow where the product makes contact with the seed. JABB liquids are compatible with most in-furrow starter fertilizers.',
            'docs'    => [
                ['Product label',    JABB_DOCS . '2026/01/2026-SBb-2.5-Inoculant-120oz.pdf'],
                ['Product label (CA)', JABB_DOCS . '2025/09/SBb-2.5-Inoculant-CA-label-120-oz-website-2025.pdf'],
                ['Safety data sheet', JABB_DOCS . '2025/03/sds-SBb-2.5-liquid.pdf'],
            ],
        ],
        [
            'slug'    => 'sbb-2-5-seed-lubricant',
            'name'    => 'SBb 2.5 Inoculant with Seed Lubricant',
            'market'  => 'Conventional',
            'form'    => 'Talc and graphite (80-20)',
            'short'   => 'Talc/graphite formulation with Beauveria bassiana for the planter seed box.',
            'body'    => 'This talc/graphite (80-20) formulation with Beauveria bassiana is for use in the planter seed box and replaces the need for separate seed lubricant.',
            'apply'   => 'Add to the planter box in place of seed lubricant. Layer the seed and product, then mix so the seed is fully covered.',
            'docs'    => [
                ['Product label',    JABB_DOCS . '2026/01/2026-SBb-2.5-Inoculant-with-Seed-Lubricant-40-ac.pdf'],
                ['Product label (CA)', JABB_DOCS . '2025/09/SBb-2.5-with-lubricant-CA-label-final-website-205.pdf'],
                ['Safety data sheet', JABB_DOCS . '2025/03/SDS-SBb-2.5-with-seed-lubricant.pdf'],
            ],
        ],
        [
            'slug'    => 'endoshield-st',
            'name'    => 'EndoShield ST',
            'market'  => 'Seed treaters',
            'form'    => 'Liquid in soybean oil carrier',
            'short'   => 'Beauveria bassiana in a soybean oil carrier for commercial seed treaters.',
            'body'    => 'Beauveria bassiana in a soybean oil carrier for commercial seed treaters. It can be mixed with existing seed treatment products or applied alone. EndoShield ST is a different formulation from SBb 2.5 and is not meant for in-furrow applications.',
            'apply'   => 'Apply through a commercial seed treater. Pre-treating seed ensures Beauveria bassiana contacts the seed coat and can become a symbiotic endophyte.',
            'docs'    => [
                ['Product label',    JABB_DOCS . '2026/01/2026-EndoShield-ST-120oz.pdf'],
                ['Safety data sheet', JABB_DOCS . '2026/01/sds-EndoShield-ST.pdf'],
            ],
        ],
    ];
}

/** Yield figures as published on the JABB Crops page. */
function yield_data(): array
{
    return [
        ['Corn',     'Average increase of 7 bushels per acre', ['Improved root and stalk development', 'Reduced mycotoxins in harvested grain', 'Improved stress tolerance'], null],
        ['Soybeans', 'Average increase of 6 bushels per acre', ['Reduced foliar diseases and stem issues', 'Improved nutrient efficiency', 'Improved germination'], null],
        ['Wheat',    'Average increase of 7 bushels per acre', ['Improved tillering', 'Improved root development'], null],
        ['Potatoes', 'Reports of 1,500 lbs per acre increase', ['Reduced potato psyllid incidence', 'Reduced rhizoctonia incidence'], JABB_DOCS . '2023/11/JABB-2023-Potato-Research.pdf'],
        ['Cotton',   'Increases of 50 lbs or more of lint per acre', ['Increased boll retention'], null],
        ['Vegetables', 'Improved plant health', ['Reduced disease incidence'], null],
    ];
}

function trial_reports(): array
{
    return [
        ['2023 trial results', JABB_DOCS . '2025/01/2023-JABB-Yield-Flyer.pdf'],
        ['2024 trial results', JABB_DOCS . '2025/01/2024-JABB-Yield-Flyer.pdf'],
    ];
}

function crop_list(): array
{
    return ['Potatoes', 'Field corn', 'Sweet corn', 'Soybeans', 'Cotton', 'Sweet potatoes', 'Small grains', 'Rice', 'Sugar cane', 'Brassicas', 'Dry beans', 'Berries', 'Tomatoes', 'Leafy greens', 'Fruit trees', 'Nut trees', 'Onions', 'Grapes'];
}

/** Answers are trusted HTML (written here, never user input). */
function faqs(): array
{
    return [
        ['Does a fungicide treatment on seed affect the efficacy of the inoculant?',
         'No. JABB’s <em>Beauveria bassiana</em> is applied to the seed as spores. These spores are highly resistant to harsh environmental conditions, and in this biological stage are unaffected by fungicides. As plants begin to germinate, <em>Beauveria</em> establishes itself in the plant as a symbiotic endophyte, so it sits outside the fungicide’s zone of efficacy.'],
        ['How do I apply SBb 2.5 or SPE-120 to my seed?',
         '<p>JABB’s liquid formulations of SBb 2.5 and SPE-120 can be applied in-furrow where contact with the seed is being made. They are compatible with most in-furrow starter fertilizers.</p><p>The talc/graphite formulations go in the planter box and replace the need for additional seed lubricant. When adding seed, layer the seed and the SBb 2.5 or SPE-120 and mix to ensure complete coverage.</p><p>EndoShield ST is a liquid formulation used with commercial seed treaters.</p>'],
        ['How does Beauveria work in the plant?',
         'Spores of <em>Beauveria bassiana</em> are applied to the seed coat. When the seed germinates, the spores germinate and grow within the plant. As the plant grows, the colonies continue to grow between the cells in the roots, stems and leaves, making <em>Beauveria</em> a true systemic endophyte. Its presence can elicit a plant response that enhances the plant’s natural defenses to pests, pathogens and other stressors. Because of this relationship, JABB reports increased yields and decreased inputs, improving the grower’s return on investment.'],
        ['How is EndoShield ST different from SBb 2.5?',
         'EndoShield ST is for use through commercial seed treaters. It is a different formulation from SBb 2.5 and is not meant for in-furrow applications. It lets the grower pre-treat seed and ensures <em>Beauveria bassiana</em> contact with the seed coat so it can become a symbiotic endophyte.'],
        ['Is the liquid or talc/graphite formulation better?',
         'Neither is better. JABB offers different formulations to fit different operations. The most important factor is good coverage of your seed.'],
    ];
}

function team(): array
{
    return [
        ['Jim Arends',       'President/CEO',                    ['919-965-9007', '919-622-6841']],
        ['Ben Arends',       'VP of Production and Marketing',   ['919-965-9007', '515-689-9530']],
        ['Angie Pleasants',  'Office Manager',                   ['919-965-9007']],
        ['Ralph Stonerock',  'Technical Service',                ['937-243-9707']],
        ['Hannah Gray',      'Field Development',                ['919-915-3950']],
    ];
}

function contact_topics(): array
{
    return [
        'general'   => 'General question',
        'organic'   => 'Organic products',
        'marketing' => 'Marketing',
        'support'   => 'Technical support',
    ];
}
