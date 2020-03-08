<template>
    <header class="header fadeInDown">
        <div id="logo">
            <a href="index.html">
                <img src="img/logo.png" width="149" height="42" data-retina="true" alt />
            </a>
        </div>

        <div v-if="isLoged">
            <ul id="top_menu">
                <li>
                    <router-link exact to="/" class="login">Home</router-link>
                </li>
                <li>
                    <router-link exact to="/games/list" class="login">Courses</router-link>
                </li>
                <li>
                    <router-link exact to="/profile/1" class="login">Profile</router-link>
                </li>
                <li>
                    <a href="#" id="logout-link" @click.prevent="logout">({{ userData.name }}) Logout</a>
                </li>
                <li></li>
            </ul>
        </div>
        <div v-else>
            <ul id="top_menu">
                <li>
                    <a href="/login" class="login">Login</a>
                </li>
                <li>
                    <a href="/register" class="login">Register</a>
                </li>
                <li></li>
            </ul>
        </div>

        <!-- /top_menu -->
    </header>
</template>
<script>
    export default {
        data() {
            return {
                isLoged: false,
                userData: ""
            };
        },
        methods: {
            logout(evt) {
                axios
                    .post("/logout")
                    .then(response => {
                        localStorage.removeItem("auth_token");
                        localStorage.clear();

                        delete axios.defaults.headers.common["Authorization"];

                        this.$router.go("/login");
                    })
                    .catch(error => {
                        localStorage.removeItem("auth_token");
                        localStorage.clear();
                        delete axios.defaults.headers.common["Authorization"];
                        this.$router.go("/login");
                    });
            },
            getUserData() {
                if (window.user) {
                    this.userData = window.user;
                    this.isLoged = true;
                }
            }
        },
        created() {
            this.getUserData();
        }
    };

</script>
