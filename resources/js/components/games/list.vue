<template>
  <main>
    <section id="hero_in" class="courses">
      <div class="wrapper">
        <div class="container">
          <h1 class="fadeInUp">
            <span></span>Online courses
          </h1>
        </div>
      </div>
    </section>

    <!-- /filters -->

    <div class="container margin_60_35">
      <div class="row">
        <aside class="col-lg-3" id="sidebar">
          <div id="filters_col">
            <a
              data-toggle="collapse"
              href="#collapseFilters"
              aria-expanded="false"
              aria-controls="collapseFilters"
              id="filters_col_bt"
            >Filters</a>
            <div class="collapse show" id="collapseFilters">
              <div class="filter_type">
                <h6>Category</h6>
                <ul>
                  <li>
                    <label>
                      <input type="checkbox" class="icheck" checked />all
                      <small>({{games.length}})</small>
                    </label>
                  </li>
                  <li v-for="(category,index) in categories">
                    <label>
                      <input type="checkbox" class="icheck" />
                      {{index}}
                      <small>({{category}})</small>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <!--/collapse -->
          </div>
          <!--/filters col-->
        </aside>
        <!-- /aside -->

        <div class="col-lg-9">
          <div class="row">
            <div class="col-md-6" v-for="game in games">
              <div class="box_grid wow">
                <figure class="block-reveal">
                  <div class="block-horizzontal"></div>
                  <a href="#0" class="wish_bt"></a>
                  <router-link :to="game.link">
                    <img :src="game.thumbNail" class="img-fluid" alt />
                  </router-link>
                  <div class="preview">
                    <span>Preview course</span>
                  </div>
                </figure>
                <div class="wrapper">
                  <small>{{game.category}}</small>
                  <h3>{{game.name}}</h3>
                  <p>{{game.description}}</p>
                </div>
                <ul>
                  <li>
                    <i class="icon_like"></i>
                    {{game.like}}
                  </li>
                  <li>
                    <router-link :to="game.link">Play Now</router-link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /col -->
      </div>
      <!-- /row -->
    </div>
  </main>
</template>
<script>
export default {
  data() {
    return {
      games: [],
      categories: {
        math: 0,
        physics: 0
      }
    };
  },
  methods: {
    getCategories() {
      let categories = this.games.map(game => {
        return game.category;
      });
      for (let i = 0; i < categories.length; i++) {
        this.categories[categories[i]] = this.categories[categories[i]]
          ? this.categories[categories[i]] + 1
          : 1;
      }
      console.log(this.categories);
    },
    loadData() {
      axios
        .get("http://127.0.0.1:8000/api/games")
        .then(data => {
          this.games = data.data.map(element => {
            return {
              id: element.id,
              name: element.name,
              type: element.type,
              category: element.categ_id == 1 ? "math" : "physics",
              thumbNail: "/../img/" + element.thubnail,
              description: element.description,
              link: element.id.toString()
            };
          });
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  async created() {
    await this.loadData();
    this.getCategories();
  }
};
</script>