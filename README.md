## Laravel Install with breze
    laravel new example-app
## scout install
    composer require laravel/scout
## tntsearch install 

    composer require teamtnt/laravel-scout-tntsearch-driver

## Add to .env
    SCOUT_DRIVER=tntsearch

Then you should publish scout.php configuration file to your config directory

    php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"

In your config/scout.php add:

    'tntsearch' => [
        'storage' => storage_path(), //place where the index files will be stored
        'fuzziness' => env('TNTSEARCH_FUZZINESS', false),
        'fuzzy' => [
            'prefix_length' => 2,
            'max_expansions' => 50,
            'distance' => 2,
            'no_limit' => true
        ],
        'asYouType' => false,
        'searchBoolean' => env('TNTSEARCH_BOOLEAN', false),
        'maxDocs' => env('TNTSEARCH_MAX_DOCS', 500),
    ],


To prevent your search indexes being commited to your project repository, add the following line to your .gitignore file.

    /storage/*.index

The asYouType option can be set per model basis, see the example below.

## Usage

After you have installed scout and the TNTSearch driver, you need to add the Searchable trait to your models that you want to make searchable. Additionaly, define the fields you want to make searchable by defining the toSearchableArray method on the model:


    public $asYouType = true;

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
