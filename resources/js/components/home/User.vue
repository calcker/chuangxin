<template>
	<div class="card">
 		<div class="card-body">
 			<a :href="'/user/'+ user.id" class="text-center">
 				<p>
 					<img class="rounded-circle" src="/images/img_avatar.png" style="width:96px;height:96px" :alt="user.name" :title="user.name">
  				</p>
  	  			<h5 class="card-title">{{user.name}}</h5>
  	  		</a>
    		<div class="row">
	    		<ul class="nav">
				  	<li class="nav-item">
				    	<a class="nav-link active" href="#">作品</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="#">赞</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="#">关注者</a>
				  	</li>
				</ul>
			</div>

    		<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    		<a href="#" class="btn btn-primary">Go somewhere</a>
  		</div>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
	data: function() {
		return {
			user: {
				id: null,
    			name: null
			}
		}
	},

	computed: {
		...mapGetters([
			//'isLoggedIn',
			'userInfo'
		])
	},

	mounted() {

		this.user.id = this.userInfo.id;
		this.user.name = this.userInfo.name;

		this.counts();


		//console.log(.$store.getters.doneTodosCount);
		//console.log(this.userInfo);
		//
		//console.log(this.$store.getters.userInfo);

		//this.user.id = this.$store.dispatch('GET_AUTH_DATA','id');
		//this.user.name = this.$store.dispatch('GET_AUTH_DATA','name');

	
	},

	methods: {

		counts: function(){
			
			axios.post('/counts/my', 'dd').then(response => {

		      		console.log(response);


		    }).catch(error => {
					
					console.log(error);

	        });


		}



	}

}
</script>
