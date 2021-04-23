# Grabo
This micro project is created to serve as a sample portfolio project.

It should demonstrate my approach to thinking about problems, and my way of breaking bigger problem down to small pieces.

## What is this Grabo thing all about?
The idea behind Grabo came from my personal need of orienting myself in tons of car ads on web. 
As a progammer I wanted to search systematically and therefore some data scraping tool immediatelly came to my mind.

This current implementation is just a real basic skeleton of my main idea.

## How it works

The whole project consists of two parts - Grabber and Queue.

### Grabber
Grabber part is responsible for grabbing data from various sources (car ads websites). 
Only sauto.cz as data source is implemented, but by implementing **GrabberSourceInterface** there can be easily added more sources.

### Queue
This part is responsible for holding and processing grabbed data. 
It is meant to be independent on time-consuming data grabbing in Grabber part.
Items in queue can be easily stored in database table for later processing.

Processing of items (**QueueProcessor**) could be later moved, but for now there is no reason to separate that further.

### Data analysis
This part is not implemented at all, because for this I would have to incorporate database.
However, it seems like reasonable next step for working with grabbed data.

## How to run it
Now I am running it only by executing **index.php** file in console.
Do not forget to run **composer install** to have all dependencies.

## Ideas for future implementation and improvements
- Implement configurable ads selection - enable entering model, price range, age etc. to get relevant data (use it for building target URL).
  However, it would need more abstraction to be universal and parameter conversion for different sources (sauto.cz has different manufacturer handling in URL than let's say tipcars.com, carvago.com, ...)
- Implement looping through all available ads pages (now it grabs ads only from the first page).
- Look for TODO comments and work on them.
- Be more aware of unstability of external website - it can be down, it can respond unexpected data, etc.
- Class constants - now they are all in implemented classes, but I am not sure about this placing.
- Write unit tests