<template>
	<div class="card">
 		<div class="card-body">
 			<h6 class="card-title"><b>创客:</b></h6>
 			<a :href="'/user/'+ user.id" class="text-center">
 				<p>
 					<img class="rounded-circle" src="/images/img_avatar.png" style="width:96px;height:96px" :alt="user.name" :title="user.name">
  				</p>
  	  			<h5 class="card-title">{{user.name}}</h5>
  	  		</a>
    		<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    		<div class="row text-center">
    			<div class="col-md-4">
			    	<a class="nav-link" href="/my/works/">
			    		<h5>{{user.works}}</h5>
			    		<p>作品</p>
			    	</a>
    			</div>
				<div class="col-md-4">
					<a class="nav-link" href="/my/opinions/">
			  			<h5>{{user.opinions}}</h5>
			    		<p>见解</p>
			    	</a>
				</div>
    			<div class="col-md-4">
			    	<a class="nav-link" href="/my/praises/">
			    		<h5>{{user.praises}}</h5>
			    		<p>赞</p>
			    	</a>
				</div>
			</div>
    	</div>
    	<ul class="list-group list-group-flush">
    		<li class="list-group-item">
    			<a href="/router#/works/new" class="btn btn-outline-secondary btn-block">
    				<i class="fas fa-plus"></i> 新建作品
    			</a>
    		</li>
    		<li class="list-group-item">
    			<a href="/router#/team/new" class="btn btn-outline-secondary btn-block">
    				<i class="fas fa-users"></i> 新建团队
    			</a>
    		</li>
    		<li class="list-group-item">
    			<a href="/jobs" class="btn btn-outline-secondary btn-block">
    				<i class="fas fa-business-time"></i> 我要求职
    			</a>
    		</li>
    		<li class="list-group-item">
    			<a href="/sale/new" class="btn btn-outline-secondary btn-block">
    				<i class="fas fa-yen-sign"></i> 我要出售
    			</a>
    		</li>
    		<li class="list-group-item">
    			<div class="row">
    				<div class="col-md-6">
    					<a class="counts" href="/my/followers">谁关注了我 ( {{user.followers}} )</a>
    				</div>
    				<div class="col-md-6">
    					<a class="counts" href="/my/followings">我关注了谁 ( {{user.followings}} )</a>
    				</div>
    			</div>
    		</li>
    		<li class="list-group-item">
    			<div class="row">
    				<div class="col-md-6">
    					<a class="counts" href="/my/teams">我的团队 ( {{user.teams}} )</a>
    				</div>
    				<div class="col-md-6">
    					<a class="counts" href="/my/groups">我的讨论组 ( {{user.groups}} )</h6></a>
    				</div>
    			</div>
    		</li>
    		<li class="list-group-item">
    			<div class="row">
    				<div class="col-md-6">
    					<a class="counts" href="/my/topics">我的话题 ( {{user.topics}} )</h6></a>
    				</div>
    				<div class="col-md-6">
    					<a class="counts" href="/my/messages">我的消息 ( {{user.messages}} )</a>
    				</div>
    			</div>
    		</li>
    		<li class="list-group-item">
    			<div class="row">
    				<div class="col-md-6">
    					<a class="counts" href="/my/hires">我的求职 ( {{user.hires}} )</a>
    				</div>
    				<div class="col-md-6">
    					<a class="counts" href="/my/sales">我的出售 ( {{user.sales}} )</a>
    				</div>
    			</div>
    		</li>
    		<li class="list-group-item">
    			<div class="row">
    				<div class="col-md-6">
    					<a class="counts" href="/my/collects">我的收藏 ( {{user.collects}} )</a>
    				</div>
    			</div>
    		</li>
  		</ul>
	</div>
</template>


<script>
import { mapGetters } from 'vuex'

export default {
	data: function() {
		return {
			user: {
				id: null,
    			name: null,
    			followers: 0,
    			followings: 0,
    			praises: 0,
    			collects: 0,
    			topics: 0,
    			messages: 0,
    			works: 0,
    			opinions: 0,
    			sales: 0,
    			hires: 0,
    			groups: 0,
    			teams: 0
			}
		}
	},

	computed: {
		...mapGetters([
			'userInfo'
		])
	},

	mounted() {

		this.user.id = this.userInfo.id;
		this.user.name = this.userInfo.name;

		this.getCounts();

	},

	methods: {

		getCounts: function(){
			
			axios.post('/my/counts').then(response => {

	      		if(response.data.code == 201) {

	      			const data = response.data.data;

    				this.user.followers = data.followers;
    				this.user.praises = data.praises;
    				this.user.collects = data.collects;
    				this.user.messages = data.messages;
	      			this.user.works = data.works;
	      			this.user.opinions = data.opinions;
	      			this.user.sales = data.sales;
	      			this.user.hires = data.hires;
	      			this.user.groups = data.build_groups + data.join_groups;
	      			this.user.teams = data.build_teams + data.join_teams;
	      			this.user.praises = data.praises;
	      			this.user.followers = data.followers;

	      		} else {

	 				console.log(response.data.msg);
	      		
	      		}

		    }).catch(error => {
					
				console.log(error);

	        });

		}

	}

}
</script>
