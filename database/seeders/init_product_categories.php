<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class init_product_categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $data = [
        [
          "name" => "Packaged Food Items",
          "code" => "PACKAGED_FOOD_ITEMS",
          "description" => "Packaged food items are prepared, processed, and packaged for convenience and longer shelf life. These food items aim to help consumers in their busy lives and offer various options."
        ],
        [
          "name" => "Snacks",
          "code" => "SNACKS",
          "description" => "Snacks play a crucial role in the FMCG category, providing consumers with quick and easy bites, especially during breaks or while on the move. Chips, pretzels, cookies, crackers, and nuts are just a few of the many forms snacks can take."
        ],
        [
          "name" => "Soft Drinks",
          "code" => "SOFT_DRINKS",
          "description" => "These are non-alcoholic beverages that are typically carbonated and available in different flavors. Soft drinks offer a refreshing experience and commonly sell as a staple with fast foods such as pizzas and burgers."
        ],
        [
          "name" => "Juices",
          "code" => "JUICES",
          "description" => "Juices are beverages extracted from different types of fruits and vegetables. These are rich in nutrients and vitamins and are perfect for weight loss and well being of the body. Juices are consumed directly or used as ingredients in different recipes and cocktails."
        ],
        [
          "name" => "Dairy",
          "code" => "DAIRY",
          "description" => "These products come in various forms, including packaged milk cartons, yogurt cups, and cheese blocks. Private-label brands have made a mark in this segment, offering quality alternatives at competitive prices."
        ],
        [
          "name" => "Meat",
          "code" => "MEAT",
          "description" => "Meat is vital to many diets, offering a protein-rich source. Packaged meat options like bacon, sausages, ham, and deli meats undergo processing and packaging for food safety and extended shelf life. Private-label brands in this segment prioritize affordable choices, delivering value-for-money options to consumers."
        ],
        [
          "name" => "Toiletries",
          "code" => "TOILETRIES",
          "description" => "These essential personal care products are used for maintaining cleanliness and hygiene. It includes soaps, shower gels, shampoos, conditioners, body lotions, and shaving items. Besides that, perfumes and deodorants are also considered as toiletries."
        ],
        [
          "name" => "Skincare",
          "code" => "SKINCARE",
          "description" => "Skincare products are in high demand globally, with the US market projected to reach $3,044.6 million in revenue by 2027. As profits increase, so does the competition in this industry. Skincare products address diverse concerns like dryness, acne, aging, and hyperpigmentation."
        ],
        [
          "name" => "Haircare",
          "code" => "HAIRCARE",
          "description" => "Haircare products cleanse, condition, and style hair, promoting its health and vitality. This category includes shampoos, conditioners, masks, serums, oils, gels, and sprays. These products address various hair types and concerns, such as dryness, frizz, dandruff, and hair loss."
        ],
        [
          "name" => "Oral care",
          "code" => "ORAL_CARE",
          "description" => "Oral care products are vital for dental hygiene. They include toothbrushes, toothpaste, mouthwashes, dental floss, and teeth whitening products. They prevent tooth decay, gum diseases, and bad breath, promoting freshness and cleanliness."
        ],
        [
          "name" => "Laundry Detergents",
          "code" => "LAUNDRY_DETERGENTS",
          "description" => "These are products specifically designed for washing clothes, effectively removing dirt, stains, and odors from fabrics during the laundry process."
        ],
        [
          "name" => "Cleaning Agents",
          "code" => "CLEANING_AGENTS",
          "description" => "These refer to a wide range of products used for cleaning various surfaces and areas in homes or commercial settings. They help remove dirt, grime, grease, and other contaminants, ensuring a clean and hygienic environment."
        ],
        [
          "name" => "Air Fresheners",
          "code" => "AIR FRESHENERS",
          "description" => "These products are used to improve the scent and freshness of indoor spaces. They come in different forms, such as sprays, gels, or plug-ins, and are intended to mask unpleasant odors and create a more pleasant atmosphere."
        ],
        [
          "name" => "Disinfectants",
          "code" => "DISINFECTANTS",
          "description" => "These are designed to kill or inactivate microorganisms on surfaces, reducing the risk of infection or disease transmission. Disinfectants are commonly used in homes, hospitals, and other public spaces to maintain cleanliness and prevent the spread of germs."
        ],
        [
          "name" => "Over-the-Counter Medicines",
          "code" => "OVER_THE_COUNTER_MEDICINES",
          "description" => "OTC medicines are easily accessible drugs used to treat everyday ailments and minor health issues without a prescription. They provide quick relief for symptoms, allowing individuals to manage their health conditions conveniently."
        ],
        [
          "name" => "Vitamins & Supplements",
          "code" => "VITAMINS_AND_SUPPLEMENTS",
          "description" => "Vitamins and supplements cater to various nutritional deficiencies in the body. There is a huge competition in this market which requires detailed research and innovative strategies to succeed. Partnering with an FMCG branding firm, FMCG packaging design firm, or FMCG brand development firm can significantly assist in achieving these objectives."
        ],
        [
          "name" => "CBD",
          "code" => "CBD",
          "description" => "Derived from cannabis, these non-intoxicating compounds offer therapeutic benefits. This product line includes oils, tinctures, capsules, creams, and edibles for pain management, anxiety reduction, stress relief, and overall well-being. Companies within this space use FMCG branding techniques to raise awareness, brand loyalty, and sales."
        ],
        [
          "name" => "Health Drinks",
          "code" => "HEALTH_DRINKS",
          "description" => "Health drinks are popular FMCG products, including protein shakes, meal replacement shakes, and herbal teas. These are used in different situations. For instance, meal replacement shakes are helpful during weight loss. Similarly, protein shakes are helpful in body and muscle building."
        ]
      ];

      $dataSet = [];

      foreach ($data as $obj) {
        $date = date('Y-m-d H:i:s');

        $obj['created_at'] = $date;
        $obj['updated_at'] = $date;

        $dataSet[] = $obj;
      }

      DB::table('product_categories')->insert($dataSet);
    }
}
