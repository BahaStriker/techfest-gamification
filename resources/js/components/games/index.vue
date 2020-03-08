<template>
  <main>
    <section id="hero_in" class="courses">
      <div class="wrapper">
        <div class="container">
          <h1 class="fadeInUp">
            <span></span>Online course detail
          </h1>
        </div>
      </div>
    </section>
    <!--/hero_in-->

    <div class="bg_color_1">
      <div class="container margin_60_35">
        <div class="row">
          <div class="col-lg-8">
            <section id="description">
              <h2>{{game.name}}</h2>
              <p>{{game.description}}</p>
              <hr />
            </section>
            <iframe
              class="fixed-size"
              title
              width="940px"
              height="600px"
              :src="game.link"
              frameborder="no"
              scrolling="no"
            ></iframe>
            <hr />
            <!-- /section -->
          </div>
          <!-- /col -->

          <aside class="col-lg-4" id="sidebar">
            <div class="box_detail">
              <figure>
                <a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">
                  <i class="arrow_triangle-right"></i>
                  <img
                    src="http://via.placeholder.com/800x533/ccc/fff/course_1.jpg"
                    alt
                    class="img-fluid"
                  />
                  <span>View course preview</span>
                </a>
              </figure>
              <div class="price">{{game.score}} / 10</div>
            </div>
          </aside>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
  </main>
</template>
<script>
export default {
  data() {
    return {
      game: {
        id: "",
        name: "",
        type: "",
        category: "",
        thumbNail: "",
        description: "",
        link: ""
      }
    };
  },
  methods: {
    loadGameData() {
      axios
        .get("http://127.0.0.1:8000/api/games/" + this.$route.params.id)
        .then(data => {
            let res = data.data;
          this.game = {
            id: res.id,
            name: res.name,
            type: res.type,
            category: res.categ_id == 1 ? "math" : "physics",
            thumbNail: "/img/" + res.thubnail,
            description: res.description,
            link: res.link
          };
          console.log(data)
          console.log(this.game);
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  async created() {
    await this.loadGameData();
  }
};
</script>
<style lang="scss" scoped>
.game-play-desktop .game-desktop-container #game-iframed.fixed-size {
  margin: 52px 0;
}
#game-iframed.fixed-size {
  position: relative;
  margin: 0 auto;
  background-color: #fff;
}
#game-iframed {
  background-color: #fff;
}
iframe {
  border: none;
  width: 720px !important;
  height: 520px !important;
}
</style>