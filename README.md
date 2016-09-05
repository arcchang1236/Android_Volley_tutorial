# Android Volley Tutorial

## Goal

<b> Connect to MySQL database and operate on Android phones </b>

## My Tools

 * LAMP Server + phpMyAdmin
 	- [For Ubuntu] http://it-easy.tw/ubuntu-lamp/

 * Android Studio 2.1

## Volley

 * HTTP client library published by Goolgle

 * Improved some old ways like:
 	- <s> HttpClient </s> : was removed at Android 6.0
 	- HttpURLConnection : need to use and handle the thread

 * Provides three requests for loading data:
 	- StringRequest
 	- JsonObjectRequest
 	- ImageRequest

 * Provides Cache for improving performance
	- However, in a large of data transmission, the performance of volley is very bad

## Gradle

<b> compile 'com.android.volley:volley:1.0.0' </b>

## Permission for AndroidManifest.xml

`<uses-permission android:name="android.permission.INTERNET" />`

## For more details
 * Download <b> Android-PHP-from-mysql_Arc.pptx </b>

 * See my example on [Android_examples](/Android/)