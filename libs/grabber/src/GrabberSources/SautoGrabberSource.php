<?php


namespace Grabo\Grabber\GrabberSources;


use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeoutException;
use Grabo\Grabber\AdFactory;
use Grabo\Grabber\AdInterface;
use Grabo\Grabber\AdList;
use Grabo\Grabber\AdListInterface;
use Grabo\Grabber\ListInterface;
use Grabo\Grabber\ListItem;
use Grabo\Grabber\ListItemInterface;
use Symfony\Component\Panther\Client;

class SautoGrabberSource implements GrabberSourceInterface {

    public function getSourceName(): string {
        return 'Sauto.cz';
    }

    public function getList(array $config): AdListInterface {
        $client = $this->getClient();

        # Get list of ad links
        $crawler = $client->request('GET', 'https://www.sauto.cz/inzerce/osobni/skoda/octavia');
        $client->waitForVisibility('#changingResults');
        $nodesCrawler = $crawler->filter('.toDetail');
        $links = [];
        foreach($nodesCrawler as $nodeCrawler) {
            $links[] = $nodeCrawler->getAttribute('href');
            $links = array_unique($links);
            if($config['maxLinks'] == count($links)) {
                break;
            }
        }
        $client->close();
        $client->quit();

        # Visit each ad link
        $list = [];
        foreach($links as $link) {
            try {
                $list[] = $this->visitPage($link);
            } catch(NoSuchElementException|TimeoutException $exception) {
                //do nothing
            }
        }
        return new AdList($list);
    }

    /**
     * @param string $link
     * @return AdInterface
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     */
    protected function visitPage(string $link): AdInterface {
        # Check link page is correct ad page
        //todo

        $client = $this->getClient();
        $crawler = $client->request('GET', $link);
        $client->waitForVisibility('#page');

        # Ad ID from link
        preg_match('/\d+/', $link, $matches);
        $adId = $matches[0];

        # Parameters
        $brand = $crawler->filter('.brand')->text();
        $name = $crawler->filter('.name')->text();
        $title = $brand . ' ' . $name;

        $price = (float) $crawler->filterXPath("//*[@itemprop='price']")->text();

        # Validate data - if have everything that is needed to store ad, if data are not corrupted
        //todo

        # Creating response object
        return AdFactory::createAd($adId, $this->getSourceName(), $link, $title, $price);
    }

    /**
     * @return Client
     */
    protected function getClient(): Client {
        // todo - make better setting driver path
        return Client::createChromeClient(__DIR__.'/../../../../drivers/chromedriver');
    }


}