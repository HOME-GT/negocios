window.onload = function () {
    new Vue({
        el: '#home',
        data: {
            ACCESS_KEY: "Vgea-MX0AsKvNEvF1PEjTLAt2w3wXLSpoJKRF5UrqJ8",
            URL: "https://api.unsplash.com/photos/random",
            titlePhoto: '',
            userPhoto: '',
            hrefUserPhoto: '',
            width: window.screen.width,
            height: window.screen.height,
            dpr: window.devicePixelRatio
        },
        methods: {
            loadPhoto(){
                axios.get(this.URL, {
                    params:{
                        query: 'guatemala',
                        client_id: this.ACCESS_KEY,
                        featured: true,
                        orientation: 'landscape'
                    }
                }).then(response=>{
                    document.body.style.backgroundImage = `url('${response.data.urls.regular}')`;
                    this.titlePhoto = response.data.location.title;
                    this.userPhoto = response.data.user.name;
                    this.hrefUserPhoto = response.data.user.links.html;
                });
            }
        },
        mounted() {
            this.loadPhoto();
        },
    })
}
