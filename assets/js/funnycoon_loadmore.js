document,new class{constructor(){this.ajaxUrl=siteConfig?.ajaxUrl??"",this.ajaxNonce=siteConfig?.ajax_nonce??"",this.loadMoreBtn=$("#load-more"),this.init()}init(){this.loadMoreBtn.length&&(this.totalPagesCount=$("#post-pagination").data("max-pages"),this.loadMoreBtn.on("click",(()=>this.handleLoadMorePosts())))}handleLoadMorePosts(){const o=this.loadMoreBtn.data("page");if(!o)return null;const t=parseInt(o)+1;this.loadMoreBtn.text("Загрузка..."),$.ajax({url:this.ajaxUrl,type:"post",data:{page:o,action:"load_more",ajax_nonce:this.ajaxNonce},success:o=>{0===parseInt(o)?(this.loadMoreBtn.off("click",(()=>this.handleLoadMorePosts())),this.loadMoreBtn.remove()):(this.loadMoreBtn.data("page",t),$("#load-more-content").append(o),this.removeLoadMoreIfOnLastPage(t),this.loadMoreBtn.text("Загрузить еще"))},error:o=>{console.log(o)}})}removeLoadMoreIfOnLastPage(o){o+1>this.totalPagesCount&&this.loadMoreBtn.remove()}};
//# sourceMappingURL=funnycoon_loadmore.js.map