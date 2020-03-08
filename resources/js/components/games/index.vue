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
                            <hr/>
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
                        <hr/>
                        <!-- /section -->
                    </div>
                    <!-- /col -->

                    <aside class="col-lg-4" id="sidebar">
                        <div class="box_detail">
                            <div class="price">Score</div>
                            <div class="price">{{userScore}} / 10</div>
                        </div>
                        <div class="price">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="form.score">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" @click.prevent="addScore()">add score</button>
                                </div>

                            </form>
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
                },
                form: new Form({
                    score: '',
                }),
                userScore: ""
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
                        this.getScore();

                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            addScore() {

                axios
                    .post("/api/score/" + this.game.id + "/" + this.form.score + "/" + window.user.id)
                    .then(() => {
                        this.resetForm();
                        this.getScore()
                    })
                    .catch()
            },
            getScore() {
                axios
                    .get('/api/user/score/'+this.game.id+'/'+window.user.id)
                    .then(data => {
                        let res = data.data;
                        this.userScore=res;


                    })
                    .catch()
            },
            resetForm() {
                Object.keys(this.form).forEach(key => {
                    return (this.form[key] = "");
                });
            },
        },
        async created() {
            await this.loadGameData();

        },
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