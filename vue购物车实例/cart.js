new Vue({
	el:"#app",
	data:{		
		zprice:0,
		cpliebiao:[],
		chenkall:true,
	},
	mounted:function(){//组件挂载之后 页面还已展示时 加载以下函数
		this.getcpliebiao();
		this.jszprice();
	},
	filters: {//设置过滤器
		gsh: function (value) {
			return "$"+value.toFixed(2)+"元";//toFixed保留小数点两位数
		}
	},
	methods:{
		getcpliebiao:function(){//列表函数
			var _this = this;
			this.$http.get("data.json").then(function(res){//获取数据
				if (res.reason = 1){

					_this.cpliebiao = res.data.result;//赋值给当前对象cpliebiao

					_this.cpliebiao.forEach(function(res){//循环列表,用于计算默认总金额
						if (res.chenk) {
							_this.zprice += res.price * res.sl;
						}
					});
				}
				
			});
		},
		czsl:function(cp,val){//操作数量
			if (val > 0) {
				cp.sl ++
				this.jszprice();//调用计算总金额函数
			}else{
				if (cp.sl<1){
					cp.sl = 0;					
					this.jszprice();//调用计算总金额函数
				}else{
					cp.sl --
					this.jszprice();//调用计算总金额函数
				}				
			}	
		},
		czslinput:function(cp){//操作数量-文本框
			this.jszprice();//调用计算总金额函数

		},
		jszprice:function(){//计算总金额
				this.zprice = 0;
				var _this = this;
				this.cpliebiao.forEach(function(res){
					if (res.chenk) {
						_this.zprice += res.price * res.sl;
					}					
				});
		},
		chenked:function(cp){//选中商品
				cp.chenk = !cp.chenk;
				if (!cp.chenk) {
					this.chenkall = false
				}
				this.jszprice();//调用计算总金额函数
		},
		chenkedall:function(){
			this.chenkall = ! this.chenkall;
			if (this.chenkall) {
				this.cpliebiao.forEach(function(res){
					res.chenk = true				
				});				
			}else{
				this.cpliebiao.forEach(function(res){
					res.chenk = false				
				});	
			};
			this.jszprice();
		}
	}
})