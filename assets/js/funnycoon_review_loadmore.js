document,new class{constructor(){this.ajaxUrl=siteConfig?.ajaxUrl??"",this.ajaxNonce=siteConfig?.ajax_nonce??"",this.loadMoreBtnPrev=$("#reviews_button_left"),this.loadMoreBtnNext=$("#reviews_button_right"),this.init()}init(){(this.loadMoreBtnPrev.length||this.loadMoreBtnNext.length)&&(this.loadMoreBtnPrev.on("click",(()=>this.handleReviewLoadMorePostsPrev())),this.loadMoreBtnNext.on("click",(()=>this.handleReviewLoadMorePostsNext())))}handleReviewLoadMorePostsPrev(){const e=this.loadMoreBtnPrev.data("page");if(!e)return null;const t=parseInt(e)-1;$.ajax({url:this.ajaxUrl,type:"post",data:{page:t,action:"review_load_more",ajax_nonce:this.ajaxNonce},success:a=>{0===parseInt(a)||($(".reviews_slider").empty(),$(".reviews_slider").append(a),this.loadMoreBtnNext.data("page",e),this.loadMoreBtnPrev.data("page",t))},error:e=>{console.log(e)}})}handleReviewLoadMorePostsNext(){const e=this.loadMoreBtnNext.data("page");if(!e)return null;const t=parseInt(e)+1;$.ajax({url:this.ajaxUrl,type:"post",data:{page:e,action:"review_load_more",ajax_nonce:this.ajaxNonce},success:a=>{0===parseInt(a)?console.log("123"):($(".reviews_slider").empty(),$(".reviews_slider ").append(a),this.loadMoreBtnPrev.data("page",e),this.loadMoreBtnNext.data("page",t))},error:e=>{console.log(e)}})}};
//# sourceMappingURL=funnycoon_review_loadmore.js.map