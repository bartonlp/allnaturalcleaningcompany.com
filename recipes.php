<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("SITELOAD")."/siteload.php");
$S = new $_site->className($_site);
$h->title = "Safe Cleanig Recipes - All Natural Cleaning Company";
$h->desc = "Safe Cleaning Recipes. All Natural Cleaning in Albuquerque. ".
           "Cleaning service for home and business. We use only all natural products, no toxic chemicals. ".
           "Our products are 99% edable.";

$h->keywords = "Safe Cleaning Recipes";

$h->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;

$h->css = <<<EOF
  <style>
h3 {
  font-size: 1.17rem;
  display: inline-block;
  vertical-align: top;
}
h4 {
  font-size: 1rem;
  font-style: italic;
  margin: 0;
}
.title {
        font-family: 'Tangerine', serif;
        text-align: center;
}
main {
  padding: .5rem;
}
#image1 {
  width: 15rem;
  float: left;
}
.image {
  display: inline-block;
  height: 100px;
  margin-right: 20px;
}
.clearboth {
  clear: both;
}
.border {
  border: 1px solid black;
  padding: .5rem;
}
  </style>
EOF;

$h->script = <<<EOF
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@type": "Recipe",
        "url": "http://www.allnaturalcleaningcompany.com/recipes.php#lemon",
        "name": "Lemon Cleaner",
        "image": "http://www.allnaturalcleaningcompany.com/images/lemon.png",
        "author": {
          "@type": "Person",
          "name": "Barton Phillips"
        },
        "datePublished": "2016-07-27",
        "description": "For all surfaces except glass",
        "recipeIngredient": [
          "2 cups water",
          "2 tablespoons fresh squezed lemon juce",
          "1/2 teaspoon Dr. Bronner's Castile soap",
          "1 tablespoon baking soda"
        ],
        "recipeInstructions": "Pour all ingredients into a 16 oz. spray bottle. Not for glass.",
        "prepTime": "PT5M",
        "cookTime": "PT0M",
        "recipeYield": "16 oz",
        "nutrition": {
          "@type": "NutritionInformation",
          "calories": "0"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
            "ratingValue": "5.0",
            "ratingCount": "100"
        }
      }
    },
    {
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@type": "Recipe",
        "url": "http://www.allnaturalcleaningcompany.com/recipes.php#oil",
        "name": "Oil Cleaner",
        "image": "http://www.allnaturalcleaningcompany.com/images/Oil.png",
        "author": {
          "@type": "Person",
          "name": "Barton Phillips"
        },
        "datePublished": "2016-07-27",
        "description": "For all surfaces except glass",
        "recipeIngredient": [
          "3/4 cup water",
          "/4 cup rubbing alcohol",
          "5-10 drops peppermint, lemon or orange essential oil",
          "1 squirt natural dish soap"
        ],
        "recipeInstructions": "Pour ingredients into a 24 oz. spray bottle. Not for glass",
        "prepTime": "PT5M",
        "cookTime": "PT0M",
        "recipeYield": "24 oz",
        "nutrition": {
          "@type": "NutritionInformation",
          "calories": "0"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.5",
          "ratingCount": "90"
        }
      }
    },
    {
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@type" : "Recipe",
        "url": "http://www.allnaturalcleaningcompany.com/recipes.php#vinegar",
        "name": "Vinegar",
        "image": "http://www.allnaturalcleaningcompany.com/images/vinegar.png",
        "author": {
          "@type": "Person",
          "name": "Barton Phillips"
        },
        "datePublished": "2016-07-27",
        "description": "For all surfaces.",
        "recipeIngredient": [
          "1/2 cup vinegar",
          "1/2 cup vodka (wait until you are finished cleaning to drink more vodka.)",
          "10 drops lavender oil",
          "10 drops lemon oil",
          "1 1/2 cups water"
        ],
        "recipeInstructions": "Pour ingrediants into a 24 oz spray bottle. Not for wood.",
        "prepTime": "PT5M",
        "cookTime": "PT0M",
        "recipeYield": "24 oz",
        "nutrition": {
          "@type": "NutritionInformation",
          "calories": "0"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.7",
          "ratingCount": "97"
        }
      }
    },
    {
      "@type": "ListItem",
      "position": 4,
      "item": {
        "@type" : "Recipe",
        "url": "http://www.allnaturalcleaningcompany.com/recipes.php#wipes1",
        "name": "Wipes 1",
        "image": "http://www.allnaturalcleaningcompany.com/images/wipes.png",
        "author": {
          "@type": "Person",
          "name": "Barton Phillips"
        },
        "datePublished": "2016-07-27",
        "description": "Kitchen counters, appliances, inside and outside of the refrigerator.",
        "recipeIngredient": [
          "2 cup water",
          "1/2 cup white vinegar",
          "8-10 drops lemon essential oil",
          "8-10 drops eucalyptus essential oil",
          "5-7 drops tea tree essential oil"
        ],
        "recipeInstructions": "Mix ingredients in a quart container. Insert 5 to 10 wash cloths into a jar and pour solution over.",
        "prepTime": "PT5M",
        "cookTime": "PT0M",
        "recipeYield": "1 quart",
        "nutrition": {
          "@type": "NutritionInformation",
          "calories": "0"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.8",
          "ratingCount": "100"
        }
      }
    },
    {
      "@type": "ListItem",
      "position": 5,
      "item": {
        "@type" : "Recipe",
        "url": "http://www.allnaturalcleaningcompany.com/recipes.php#wipes2",
        "name": "Wipes 2",
        "image": "http://www.allnaturalcleaningcompany.com/images/wipes.png",
        "author": {
          "@type": "Person",
          "name": "Barton Phillips"
        },
        "datePublished": "2016-07-27",
        "description": "Kitchen counters, appliances, inside and outside of the refrigerator.",
        "recipeIngredient": [
          "2 cup water",
          "4 Tbsp Castile Soap",
          "16-20 drops tea tree essential oil"
        ],
        "recipeInstructions": "Mix ingredients in a quart container. Insert 5 to 10 wash cloths into a jar and pour solution over.",
        "prepTime": "PT5M",
        "cookTime": "PT0M",
        "recipeYield": "1 quart",
        "nutrition": {
          "@type": "NutritionInformation",
          "calories": "0"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.5",
          "ratingCount": "90"
        }
      }
    }
  ]
}
</script>
EOF;

list($top, $footer) = $S->getPageTopBottom($h, $b);

echo <<<EOF
$top
<main>
<h1 class="title">Safe Cleaning Recipes:</h1>

<!-- position 1 -->
<div class="border">
<img  id="lemon" class="image" src="http://bartonphillips.net/images/allnatural/lemon.png" alt="Lemon Cleaner">
<h3>Lemon Cleaner</h3>
<h4>Great as a spray on kitchen counters, refrigerators and stoves. Not for windows or wood.</h4>

<ul>
<li>2 cups water
<li>2 tablespoons fresh squezed lemon juce
<li>1/2 teaspoon Dr. Bronner's Castile soap
<li>1 tablespoon baking soda
</ul>
<p>Pour into a 24 oz. spray bottle and shake well.</p>
</div>

<!-- position 2 -->
<div class="border">
<img  id="oil" class="image" src="http://bartonphillips.net/images/allnatural/Oil.png" alt="Essential Oil Cleaner">
<h3>Essential Oil Cleaner</h3>
<h4>For wood, counters, refrigerators and stoves. Just spray and wipe.</h4>

<ul>
<li>3/4 cup water
<li>1/4 cup rubbing alcohol
<li>5-10 drops peppermint, lemon or orange essential oil
<li>1 squirt natural dish soap
</ul>
<p>Pour all the ingrediants into a 16 oz. spray bottle and shake well.</p>
</div>

<!-- position 3 -->
<div class="border">
<img id="vinegar" class="image" src="http://bartonphillips.net/images/allnatural/vinegar.png" alt="Vinegar and Vodka Cleaner">
<img class="image" src="http://bartonphillips.net/images/allnatural/vodka.png" alt="Vigegar and Vodka Cleaner">
<h3>Vinegar and Vodka Cleaner</h3>
<h4>General cleaning. Spray on conter tops, inside and outside of refrigerators, stoves, floors. Not for wood.</h4>

<ul>
<li>1/2 cup vinegar
<li>1/2 cup vodka (wait until you are finished cleaning to drink the rest)
<li>10 drops lavender oil
<li>10 drops lemon oil
<li>1 1/2 cups water
</ul>
<p>Pour ingrediants into t 24 oz. spray bottle and shake well. Not for wood.</p>
</div>

<!-- position 4 -->
<div class="border">
<img id="wipes1" class="image" src="http://bartonphillips.net/images/allnatural/wipes.png" alt="Disinfectant Wipes 1">
<h3>Disinfectent Wipes #1</h3>
<h4>Great general purpous wip for just about anything.</h4>

<ul>
<li>2 cup water
<li>1/24 cup white vinegar
<li>8-10 drops lemon essential oil
<li>8-10 drops eucalyptus essential oil
<li>5-7 drops tea tree essential oil
</ul>

<p>The vinegar has disinfecting properties and the essential oils provide anti-bacterial and natural
germicide properties, while also giving the solution a pleasant scent.</p>
</div>

<!-- position 5 -->
<div class="border">
<img id="wipes2" class="image" src="http://bartonphillips.net/images/allnatural/wipes.png" alt="Disinfectant Wipes 2">
<h3>Disinfectent Wipes #2</h3>
<h4>Another general purpous wip. Great for quick cleanup.</h4>

<ul>
<li>2 cup water
<li>4 Tbsp Castile Soap
<li>16-20 drops tea tree essential oil
</ul>

<p>This is basically my multipurpose cleaner for using with the wipes. The tea tree oil has
anti-bacterial properties and the castile soap provides the cleaning power. You can find both
castile soap and tea tree oil at Target, but I have found the best prices online.</p>
</div>
</main>
$footer
EOF;
