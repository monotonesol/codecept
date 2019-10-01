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
        $I->see("Insly - Simple Insurance Software for Brokers and MGAs", SearchResult::SEARCH_RESULTS);
        $links = $I->grabAttributeFrom('#search a[href]', 'href');
        $I->assertContains('https://insly.com/en/', $links);
    }

    /**
     * @param AcceptanceTester $I
     */
    public function pageHasCorrectTitle(AcceptanceTester $I): void
    {
        $I->amOnUrl('https://insly.com/en/');
        $I->seeInTitle('Simple Insurance Software for Brokers and MGAs');
    }
}
