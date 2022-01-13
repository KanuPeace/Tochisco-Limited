<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        @include("Dashboards.users.profile.layout.includes.head")
    </head>

    <body>
        <div id="tg-wrapper" class="tg-wrapper tg-haslayout">

            @include("Dashboards.users.profile.layout.includes.header_sidebar")

                @yield('content')

            @include("Dashboards.users.profile.layout.includes.footer")

        </div>

        @include("Dashboards.users.profile.layout.includes.script")
    </body>



    </html>
