document,new class{constructor(){this.ajaxUrl=siteConfig?.ajaxUrl??"",this.ajaxNonce=siteConfig?.ajax_nonce??"",this.loadMoreBtnPrev=$("#tops_button_left"),this.loadMoreBtnNext=$("#tops_button_right"),this.init()}init(){(this.loadMoreBtnPrev.length||this.loadMoreBtnNext.length)&&(this.loadMoreBtnPrev.on("click",(()=>this.handleReviewLoadMorePostsPrev())),this.loadMoreBtnNext.on("click",(()=>this.handleReviewLoadMorePostsNext())))}handleReviewLoadMorePostsPrev(){const t=this.loadMoreBtnPrev.data("page");if(!t)return null;const e=parseInt(t)-1;$.ajax({url:this.ajaxUrl,type:"post",data:{page:e,action:"tops_load_more",ajax_nonce:this.ajaxNonce},success:o=>{0===parseInt(o)||($(".tops_slider").empty(),$(".tops_slider").append(o),this.loadMoreBtnNext.data("page",t),this.loadMoreBtnPrev.data("page",e))},error:t=>{console.log(t)}})}handleReviewLoadMorePostsNext(){const t=this.loadMoreBtnNext.data("page");if(!t)return null;const e=parseInt(t)+1;$.ajax({url:this.ajaxUrl,type:"post",data:{page:t,action:"tops_load_more",ajax_nonce:this.ajaxNonce},success:o=>{0===parseInt(o)?console.log("123"):($(".tops_slider").empty(),$(".tops_slider").append(o),this.loadMoreBtnPrev.data("page",t),this.loadMoreBtnNext.data("page",e))},error:t=>{console.log(t)}})}removeLoadMoreIfOnLastPage(t){t+1>this.totalPagesCount&&this.loadMoreBtn.remove()}};
//# sourceMappingURL=funnycoon_tops_loadmore.js.map