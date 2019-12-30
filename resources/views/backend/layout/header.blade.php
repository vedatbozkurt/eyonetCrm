<?php

/**
 * @Author: Wedat
 * @Date:   2019-08-21 19:42:55
 * @Last Modified by:   Wedat
 * @Last Modified time: 2019-08-21 19:44:57
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Laravel based web application for customer relationship management.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@vedatbozkurtt">
    <meta property="twitter:creator" content="@vedatbozkurtt">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="WPanel Crm">
    <meta property="og:title" content="WPanel Backend Theme">
    <meta property="og:url" content="https://www.wedat.org">
    <meta property="og:description" content="WPanel Backend Theme.">
    <title>@yield('title','WPanel Crm')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('asset/backend/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('css')  
    <!-- bu sayfaya ozel css kodları -->

</head>