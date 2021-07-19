@extends('layouts.app2')

@section('content')
<div id="app">
			<p v-if="stock_number > 0">販売中です</p>
			<p v-else>在庫切れのため販売中止です</p>
		<ul>
			<li v-for="friend in friends">@{{friend}}</li>
		</ul>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
var app = new Vue({
el: '#app',
	data: {
		google: 'https://google.com',
		style: 'font-size:12px;color:red',
		stock_number: 5,
		friends: ['ken','mike','paulo','lisa','kanon']
	}
})
</script>	
@endsection


