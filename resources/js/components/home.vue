<template>
    <main>
        <section class="hero_single version_2">
            <div class="wrapper">
                <div class="container">
                    <h3>What would you learn?</h3>
                    <p>Increase your reflexes, memory, objects and just have fun!</p>
                    <form>
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input type="text" class="search-query" placeholder="Search for your favorite game"
                                       v-model="query" @keyup="searchit">
                                <input type="submit" class="btn_search" value="Search" @click.prevent="searchit">
                                <div v-if="gamesResult.status === 200" style="width: 90%;">
                                    <div class="search-query text-left"
                                         style="background-color:white; width:100%; margin:1%"
                                         v-for="gameResult in gamesResult.data" :key="gameResult.id">
                                        <a :href="'/games/'+gameResult.id"><img :src="'/img/' + gameResult.thubnail"
                                                                                height="50px" width="50px"/>
                                            {{gameResult.name}}</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /hero_single -->

        <div class="features clearfix">
            <div class="container">
                <ul>
                    <li><i class="pe-7s-study"></i>
                        <h4>+200 Games</h4><span>Explore a variety of fresh games</span>
                    </li>
                    <li><i class="pe-7s-cup"></i>
                        <h4>Leaderboard</h4><span>Find the right instructor for you</span>
                    </li>
                    <li><i class="pe-7s-target"></i>
                        <h4>Focus on target</h4><span>Rewards doesn't need luck it needs experience</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /features -->

        <div class="container margin_30_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>SlothLab Champions</h2>
                <p>Complete your challenges and reach the top</p>
            </div>
            <div class="box_cart">
                <table class="table table-striped cart-list">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Score
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="ranker in rankers">
                        <td>
                            <div class="thumb_cart">
                                <img src="http://via.placeholder.com/150x150/ccc/fff/thumb_cart_1.jpg" alt="Image">
                            </div>
                            <span class="item_cart">{{ranker.name}}</span>
                        </td>
                        <td>
                            <strong>{{ranker.score_count}} pt</strong>
                        </td>

                    </tr>

                    </tbody>
                </table>
                <!-- /cart-options -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

    </main>
</template>
<script>
    import _ from 'lodash';

    export default {
        data() {
            return {
                query: "",
                gamesResult: {},
                rankers: [],
                games: [],
            }
        },
        methods: {
            loadData() {
                axios
                    .get("/api/games")
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
            },
            searchit: _.debounce(() => {
                Fire.$emit('searching');
            }, 1000),

            ranking() {
                console.log('you are here');
                axios
                    .get('/api/ranking')
                    .then(data => {
                        let res = data.data;
                        this.rankers = res;


                    })
                    .catch()
            }
        },
        mounted() {
            Echo.channel('test')
                .listen('NewMessage', (e) => {
                    this.ranking();
                });

        },
        created() {
            Fire.$on('searching', () => {
                let query = this.query;
                axios.get('api/search/games?s=' + query)
                    .then((data) => {
                        this.gamesResult = data.data
                    })
                    .catch(() => {
                    });
            }),
                this.ranking();
            this.loadData()
        }
    }
</script>
