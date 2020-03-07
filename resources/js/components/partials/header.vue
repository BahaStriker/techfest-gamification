<template>
    <header class="header fadeInDown">
        <div id="logo">
            <a href="index.html"><img src="img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
        </div>
        <ul id="top_menu">
            <li>
                <router-link exact to="/">Home</router-link>
            </li>
            <li>
                <router-link exact to="/games/list">
                  Courses
                </router-link>
            </li>
            <li>
                <router-link exact to="/profile/1">
                  Profile
                </router-link>
            </li>
            <li><a href="login.html" class="login">Login</a></li>

            <li>

            </li>
        </ul>
        <!-- /top_menu -->
    </header>
</template>