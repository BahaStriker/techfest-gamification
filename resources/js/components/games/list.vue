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
            <div class="col-md-6" v-for="game in games" >
              <div class="box_grid wow">
                <figure class="block-reveal">
                  <div class="block-horizzontal"></div>
                  <a href="#0" class="wish_bt"></a>
                  <a :href="game.link">
                    <img :src="game.thumbNail" class="img-fluid" alt />
                  </a>
                  <div class="price">{{game.score}} / 10</div>
                  <div class="preview">
                    <span>Preview course</span>
                  </div>
                </figure>
                <div class="wrapper">
                  <small>{{game.category}}</small>
                  <h3>{{game.title}}</h3>
                  <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                </div>
                <ul>
                  <li>
                    <i class="icon_like"></i>
                    {{game.like}}
                  </li>
                  <li>
                    <a href="course-detail.html">Play Now</a>
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
      games: [
        {
          name: "test1",
          type: 1,
          category: "math",
          thumbNail:
            "http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg",
          description:
            "Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.",
          link: "game/1",
          score: 5,
          like: 20
        },
        {
          name: "test2",
          type: 2,
          category: "physics",
          thumbNail:
            "http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg",
          description:
            "Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.",
          link: "game/2",
          score: 3,
          like: 30
        },
        {
          name: "test3",
          type: 1,
          category: "physics",
          thumbNail:
            "http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg",
          description:
            "Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.",
          link: "game/3",
          score: 0,
          like: 30
        },
        {
          name: "test2",
          type: 1,
          category: "math",
          thumbNail:
            "http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg",
          description:
            "Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.",
          link: "game/4",
          score: 0,
          like: 22
        }
      ],
      categories: {
          math : 0,
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
    }
  },
  created() {
    this.getCategories();
  }
};
</script>