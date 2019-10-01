<?php
declare(strict_types=1);

use Page\Acceptance\Home;
use Facebook\WebDriver\WebDriverKeys as Key;
use Page\Acceptance\SearchResult;

/**
 * Class SearchCest
 * @package Tests
 */
class SearchCest
{
    const INSLY_URL = 'https://insly.com/en/';

    public function _before(AcceptanceTester $I): void
    {
        $I->amOnPage(Home::URL);
    }

    /**
     * @param AcceptanceTester $I
     * @throws \Exception
     */
    public function searchResultHasLink(AcceptanceTester $I): void
    {
        $I->waitForElementVisible(Home::SEARCH_FIELD);
        $I->fillField(Home::SEARCH_FIELD, 'insly.com');
        $I->pressKey(Home::SEARCH_FIELD, Key::ENTER);
        $I->waitForElementVisible(SearchResult::SEARCH_RESULTS);
        $links = $I->grabAttributeFrom(SearchResult::SEARCH_RESULTS_LINKS, 'href');
        $I->assertContains(self::INSLY_URL, $links);
    }

    /**
     * @param AcceptanceTester $I
     */
    public function pageHasCorrectTitle(AcceptanceTester $I): void
    {
        $I->amOnUrl(self::INSLY_URL);
        $I->seeInTitle('Simple Insurance Software for Brokers and MGAs');
    }
}
