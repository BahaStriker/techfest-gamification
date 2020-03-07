<template>
  <header class="header fadeInDown">
    <div id="logo">
      <a href="index.html">
        <img src="img/logo.png" width="149" height="42" data-retina="true" alt />
      </a>
    </div>
    <ul id="top_menu">
      <li v-if="!user">
        <a href="login.html" class="login">Login</a>
      </li>
      <li v-else>
        <a>test</a>
      </li>

      <li></li>
    </ul>
    <!-- /top_menu -->
  </header>
</template>
<script>
export default {
  data() {
    return {
      isLoged: false,
      userData: '',
    };
  },
  computed: {
    user() {
      return window.user!== null
    }
  },
    methods: {
        getUserData() { 
            this.userData = this.userwindow.user || '';
        },
    },
  created: () =>{
    this.getUserData();
  },
};
</script>