<?php

namespace App\Http\Controllers;

use App\BusinessDetail;
use App\Category;
use App\Customer;
use App\Discount;
use App\GrossMargin;
use App\PriceList;
use App\Quote;
use App\QuoteTerm;
use App\SubCategory;

class QuoteController extends Controller
{
    public function index()
    {
        $pageHeading = 'Quoting';
        $quotes = Quote::all();
        $businessDetails = BusinessDetail::first();
        $customers = Customer::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $priceLists = PriceList::all();
        $quoteterms = QuoteTerm::all();
        $discounts = Discount::all();
        $grossmargins = GrossMargin::all();

        return view('quoting', compact('pageHeading', 'quotes', 'businessDetails', 'customers', 'categories', 'subCategories', 'priceLists', 'quoteterms', 'discounts', 'grossmargins'));
    }

        public function show($id = '')
        {
            $pageHeading = 'Quoting';
            $category = Category::find($id);
            $subCategories = $category->subCategories;
            $categoryName = $category->category_name;

            return view('quoting', compact('pageHeading', 'subCategories', 'categoryName'));
        }
}
