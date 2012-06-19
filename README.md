Zend translate database adapter
==============================
Zend transalte has shipped with lot of adapter...except database.

Default Table structure
---------------
Table name: translations

<table>
    <tr>
        <th>column name</th>
        <th>column type</th>
        <th>column options</th>
    <tr>
    <tr>
        <td>id</td>
        <td>int</td>
        <td>auto increment, primary key</td>
    <tr>
    <tr>
        <td>msgid</td>
        <td>text</td>
        <td>contains the identifier of the string</td>
    <tr>
    <tr>
        <td>msgstring</td>
        <td>text</td>
        <td>contains the translated string</td>
    <tr>
    <tr>
        <td>locale</td>
        <td>enum (reccomended), varchar, tinyint</td>
        <td>contains the identifier of the translated text language</td>
    <tr>
</table>

Dependencies
---------------
You have to write a model which implements the following two methods:
1. getAllForCache() - fetching all rows from the table
2. getListByLocale($locale) - fetching only rows that matches the locale statement

Usage Example
---------------
You shoud put this file into a zend extension folder which is able to load by autoload method.
After your only thing to do that put this class through an zend translator option.

