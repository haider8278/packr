<?php
Route::get('search', 'SearchController@index')->name('search');

Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');
Route::get('autocomplete-user', 'SearchController@autocompleteUser')->name('autocomplete-user');

Route::get('page/{slug}', 'SearchController@page');
Route::get('faqs', 'SearchController@faqs');
