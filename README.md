# Laravel Web Crawler Coding Test

## How it works

The project has 2 crawlers:

1. The search crawler

2. The list crawler


## Pages

### Index Page 

See code here: [welcome.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/welcome.blade.php)

The index page is the landing page for the website. This page provides 2 links for the user:

1. Data Init Link

	- The user clicks this link to set up their database and table for the web crawlers. Initializing the database and table is not necessary for the crawlers to work.

2. Crawl Data Link

	- The user clicks this link if they want to skip the database and table set up. The project still works if users don't set up the database. The search and list views are created from crawlers data. The list view pagination is also created from crawlers data.

### Database Init Page 

See code here: [data-init.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/data-init.blade.php)

The page that sets up the database for the user. The page checks if 

### Table Init Page 

See code here: [data-ready.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/data-ready.blade.php)

add a sample of the table as a visual for that page

### Search Page 

See code here: [search.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/search.blade.php)

a

### Search Results Page 

See code here: [scraper.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/scraper.blade.php)


a

### Links Page 

See code here: [list.blade.php](https://github.com/markoco14/laravel-scraper/blob/main/resources/views/list.blade.php)

a

