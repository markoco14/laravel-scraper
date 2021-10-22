# Laravel Web Crawler Coding Test

## How it works

The project has 2 crawlers:

1. The search crawler

2. The list crawler


## Pages

### Index

See code here: [welcome.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/welcome.blade.php)

The index page is the landing page for the website. This page provides 2 links for the user:

1. Data Init Link

	- The user clicks this link to set up their database and table for the web crawlers. Initializing the database and table is not necessary for the crawlers to work.

![image of data init button](resources/images/choose-data-init.png)

2. Search Data Link

	- The user clicks this link if they want to skip the database and table set up. The project still works if users don't set up the database. The search and list views are created from crawlers data. The list view pagination is also created from crawlers data.

![image of search button](resources/images/choose-search-stats.png)

### Database Init

See code here: [data-init.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/data-init.blade.php)

The Database Init page helps the user set up the database. When the page loads, the Controller will check if the 'links' table exists.

If the 'links' table doesn't exist, the controller will make the table in the database using the Schema. The user needs to make sure their database connection is properly configured.

The .env file is already configured to use localhost for the database connection. And the database is name is set to "coronavirus_scraper_data". I used PHPMyAdmin to hold the database and tables but the user may change the configurations to suit their needs.

![image of env db configs](/resources/images/env-db-configs.png)

If the 'links' table does exist, the controller tells the user the table is ready.

Once the 'links' table is created, the user can click the CHECK DATA button to go to the Table Init Page.

![the get data button](/resources/images/check-data-button.png)

### Table Init

See code here: [data-ready.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/data-ready.blade.php)

///////////////////////////////////////////////////
ADD A SAMPLE TABLE TO THE WEBSITE
///////////////////////////////////////////////////

The Table Init page fills the table with data. First it checks if the 'links' table is empty or not.

If the 'links' table is empty, the program will run an INSERT query. crawl the data and insert it into the database. The crawler will collect the country names, search hrefs, confirmed cases, deaths, and recovered cases.

If the 'links' table is not empty, the program will assume the data has already been collected and will run an UPDATE query. The data will crawl the confirmed cases, deaths, and recovered cases for each country and update the table. This makes sure the data is always up-to-date. 

![the crawl stats button](/resources/images/crawl-stats-button.png)

### Search

See code here: [search.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/search.blade.php)

The search page lets the user search the entire [worldometer website](https://www.worldometers.info/coronavirus/) for worldwide coronavirus stats, or stats from any country of their choosing. 

![the search page](/resources/images/search-page.png)

The base URL for worldometer is placed in the main search input by default. The user can choose between a "Worldwide" search and a "Country" search.

When the "Country" selector is chosen, the country name input appears below.

![the country search selector](/resources/images/country-search-selector.png)



### Search Results

See code here: [scraper.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/scraper.blade.php)


a

![search results example](/resources/images/search-results-page.png)

### Links

See code here: [list.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/list.blade.php)

a

![paginated-links-example](/resources/images/links-page.png)

