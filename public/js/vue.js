new Vue({
    el: '#app',
    data: {
      games: []
    },
    mounted() {
      axios.get('/api/games').then(response => this.games = response.data);
      this.getGames();
      axios.get('/api/roles').then(response => this.roles = response.data);
      this.getGames();
    },
    methods: {
      onSubmit() {
        axios.post('/games');
      },
      getGames() {
        $.getJSON("{{ route('api/games') }}", function(games) {
            $this.games = games;
        }).bind(this);
      }
    }
});
