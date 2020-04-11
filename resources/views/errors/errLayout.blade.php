@extends('layouts.app')

@section('title')
@yield('errCode') - @yield('errMessage')
@endsection

@section('head-stylesheet')
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
            background: rgb(0,27,64);
            background: linear-gradient(297deg, rgba(0,27,64,1) 0%, rgba(54,8,89,1) 100%);
        }

        .error-page {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100%;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }
        .error-page h1 {
            font-size: 30vh;
            font-weight: bold;
            position: relative;
            margin: -8vh 0 0;
            padding: 0;
        }
        .error-page h1:after {
            content: attr(data-h1);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            color: transparent;
            /* webkit only for graceful degradation to IE */
            background: -webkit-repeating-linear-gradient(-45deg, #71b7e6, #69a6ce, #b98acc, #ee8176, #b98acc, #69a6ce, #9b59b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 400%;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.25);
            animation: animateTextBackground 10s ease-in-out infinite;
            }
            .error-page h1 + p {
            color: #d6d6d6;
            font-size: 6vh;
            font-weight: bold;
            line-height: 10vh;
            max-width: 600px;
            position: relative;
            }
            .error-page h1 + p:after {
            content: attr(data-p);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            color: transparent;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
            -webkit-background-clip: text;
            -moz-background-clip: text;
            background-clip: text;
        }

        #particles-js {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        @keyframes animateTextBackground {
        0% {
            background-position: 0 0;
        }
        25% {
            background-position: 100% 0;
        }
        50% {
            background-position: 100% 100%;
        }
        75% {
            background-position: 0 100%;
        }
        100% {
            background-position: 0 0;
        }
        }
        @media (max-width: 767px) {
        .error-page h1 {
            font-size: 32vw;
        }
        .error-page h1 + p {
            font-size: 8vw;
            line-height: 10vw;
            max-width: 70vw;
        }
        }
        .btn-back {
            position: fixed;
            right: 40px;
            bottom: 40px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-hover {
            width: 200px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            margin: 20px;
            height: 55px;
            text-align:center;
            border: none;
            background-size: 300% 100%;

            border-radius: 50px;
            moz-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .btn-hover:hover {
            background-position: 100% 0;
            moz-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .btn-hover:focus {
            outline: none;
        }

        .btn-hover.color-1 {
            background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
            box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
        }
        .btn-hover.color-2 {
            background-image: linear-gradient(to right, #f5ce62, #e43603, #fa7199, #e85a19);
            box-shadow: 0 4px 15px 0 rgba(229, 66, 10, 0.75);
        }
        .btn-hover.color-3 {
            background-image: linear-gradient(to right, #667eea, #764ba2, #6B8DD6, #8E37D7);
            box-shadow: 0 4px 15px 0 rgba(116, 79, 168, 0.75);
        }
        .btn-hover.color-4 {
            background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);
            box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75);
        }
        .btn-hover.color-5 {
            background-image: linear-gradient(to right, #0ba360, #3cba92, #30dd8a, #2bb673);
            box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75);
        }
        .btn-hover.color-6 {
            background-image: linear-gradient(to right, #009245, #FCEE21, #00A8C5, #D9E021);
            box-shadow: 0 4px 15px 0 rgba(83, 176, 57, 0.75);
        }
        .btn-hover.color-7 {
            background-image: linear-gradient(to right, #6253e1, #852D91, #A3A1FF, #F24645);
            box-shadow: 0 4px 15px 0 rgba(126, 52, 161, 0.75);
        }
        .btn-hover.color-8 {
            background-image: linear-gradient(to right, #29323c, #485563, #2b5876, #4e4376);
            box-shadow: 0 4px 15px 0 rgba(45, 54, 65, 0.75);
        }
        .btn-hover.color-9 {
            background-image: linear-gradient(to right, #25aae1, #4481eb, #04befe, #3f86ed);
            box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
        }
        .btn-hover.color-10 {
                background-image: linear-gradient(to right, #ed6ea0, #ec8c69, #f7186a , #FBB03B);
            box-shadow: 0 4px 15px 0 rgba(236, 116, 149, 0.75);
        }
        .btn-hover.color-11 {
            background-image: linear-gradient(to right, #eb3941, #f15e64, #e14e53, #e2373f);  box-shadow: 0 5px 15px rgba(242, 97, 103, .4);
        }
    </style>
@endsection

@section('body-layout')
    <div class="error-page">
        <div>
            <h1 data-h1="@yield('errCode')">@yield('errCode')</h1>
            <p>@yield('errMessage')</p>
        </div>
    </div>
    <a href="/"><button class="btn-back btn-hover color-7">BACK HOME</button></a>
@endsection
