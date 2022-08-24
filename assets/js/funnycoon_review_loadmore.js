
(function(doc){class ReviewLoadMore{constructor(){this.ajaxUrl=siteConfig?.ajaxUrl??'';this.ajaxNonce=siteConfig?.ajax_nonce??'';this.loadMoreBtnPrev=$('#reviews_button_left');this.loadMoreBtnNext=$('#reviews_button_right');this.init();}
init(){if(!this.loadMoreBtnPrev.length&&!this.loadMoreBtnNext.length){return;}
this.loadMoreBtnPrev.on('click',()=>this.handleReviewLoadMorePostsPrev());this.loadMoreBtnNext.on('click',()=>this.handleReviewLoadMorePostsNext());}
handleReviewLoadMorePostsPrev(){const page=this.loadMoreBtnPrev.data('page');if(!page){return null;}
const prevPage=parseInt(page)-1;$.ajax({url:this.ajaxUrl,type:'post',data:{page:prevPage,action:'review_load_more',ajax_nonce:this.ajaxNonce,},success:(response)=>{if(0===parseInt(response)){}else{$('.reviews_slider').empty();$('.reviews_slider').append(response);this.loadMoreBtnNext.data('page',page);this.loadMoreBtnPrev.data('page',prevPage);}},error:(response)=>{console.log(response);},});}
handleReviewLoadMorePostsNext(){const page=this.loadMoreBtnNext.data('page');if(!page){return null;}
const nextPage=parseInt(page)+1;$.ajax({url:this.ajaxUrl,type:'post',data:{page:page,action:'review_load_more',ajax_nonce:this.ajaxNonce,},success:(response)=>{if(0===parseInt(response)){console.log('123');}else{$('.reviews_slider').empty();$('.reviews_slider ').append(response);this.loadMoreBtnPrev.data('page',page);this.loadMoreBtnNext.data('page',nextPage);}},error:(response)=>{console.log(response);},});}}
new ReviewLoadMore();})(document);
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImZ1bm55Y29vbl9yZXZpZXdfbG9hZG1vcmUuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IjtBQUFBLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUUsQ0FBRSxDQUtmLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUlqQixDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQ1YsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FDeEMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQzdDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFFLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FDbEQsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBRW5ELENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUNmLENBQ1A7QUFDTyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUVILENBQUMsQ0FBRSxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBRSxDQUNsRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUNWLENBQ1g7QUFDVyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFFLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQzlFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQUUsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FFbEYsQ0FTSztBQUNMLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FFNUIsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBRWhELENBQUMsQ0FBRSxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFFLENBQ1YsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQ2YsQ0FDWDtBQUNXLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBRSxDQUFFLENBQUMsQ0FFckMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUNKLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FDakIsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQ1osQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQ0YsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUNkLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FDMUIsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUM5QixDQUFDLENBQ0QsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFFLENBQ3JCLENBQUMsQ0FBRSxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBRSxDQUVsQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FDSCxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQzlCLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FDeEMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQ3pDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQ2pELENBQ0osQ0FBQyxDQUNELENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFFLENBQ25CLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQzNCLENBQUMsQ0FFTCxDQUFDLENBQUMsQ0FFTixDQVNLO0FBQ0wsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUU1QixDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FFaEQsQ0FBQyxDQUFFLENBQUUsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FDVixDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FDZixDQUNYO0FBQ1csQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFFLENBQUUsQ0FBQyxDQUdyQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQ0osQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUNqQixDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FDWixDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FDRixDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUNWLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FDMUIsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUM5QixDQUFDLENBQ0QsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBQyxDQUFFLENBQ3JCLENBQUMsQ0FBRSxDQUFFLENBQUUsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUUsQ0FBRSxDQUM5QixDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUN0QixDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FDSCxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQzlCLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUN6QyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FDekMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FDakQsQ0FDSixDQUFDLENBQ0QsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBRSxDQUFDLENBQUUsQ0FDbkIsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFFLENBQUMsQ0FDM0IsQ0FBQyxDQUVKLENBQUMsQ0FBQyxDQUdQLENBRUosQ0FDSDtBQUNHLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUV4QixDQUFFLENBQUMsQ0FBRSxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FBQyxDQUFDLENBQUUsQ0FBQyIsImZpbGUiOiJmdW5ueWNvb25fcmV2aWV3X2xvYWRtb3JlLmpzIiwic291cmNlc0NvbnRlbnQiOlsiKCBmdW5jdGlvbiAoIGRvYyApIHtcclxuICAgIC8qKlxyXG4gICAgICogQ2xhc3MgTG9hZG1vcmVcclxuICAgICAqL1xyXG5cclxuICAgIGNsYXNzIFJldmlld0xvYWRNb3JlIHtcclxuICAgICAgICAvKipcclxuICAgICAgICAgKiBDb25zdHJ1Y3RvciBcclxuICAgICAgICAgKi9cclxuICAgICAgICBjb25zdHJ1Y3RvcigpIHtcclxuICAgICAgICAgICAgdGhpcy5hamF4VXJsID0gc2l0ZUNvbmZpZz8uYWpheFVybCA/PyAnJztcclxuICAgICAgICAgICAgdGhpcy5hamF4Tm9uY2UgPSBzaXRlQ29uZmlnPy5hamF4X25vbmNlID8/ICcnO1xyXG4gICAgICAgICAgICB0aGlzLmxvYWRNb3JlQnRuUHJldiA9ICQoICcjcmV2aWV3c19idXR0b25fbGVmdCcgKTtcclxuICAgICAgICAgICAgdGhpcy5sb2FkTW9yZUJ0bk5leHQgPSAkKCAnI3Jldmlld3NfYnV0dG9uX3JpZ2h0JyApO1xyXG5cclxuICAgICAgICAgICAgdGhpcy5pbml0KCk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBpbml0KCkge1xyXG5cclxuICAgICAgICAgICAgaWYgKCAhIHRoaXMubG9hZE1vcmVCdG5QcmV2Lmxlbmd0aCAmJiAhIHRoaXMubG9hZE1vcmVCdG5OZXh0Lmxlbmd0aCApIHtcclxuICAgICAgICAgICAgICAgIHJldHVybjtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgdGhpcy5sb2FkTW9yZUJ0blByZXYub24oICdjbGljaycsICgpID0+IHRoaXMuaGFuZGxlUmV2aWV3TG9hZE1vcmVQb3N0c1ByZXYoKSApO1xyXG4gICAgICAgICAgICB0aGlzLmxvYWRNb3JlQnRuTmV4dC5vbiggJ2NsaWNrJywgKCkgPT4gdGhpcy5oYW5kbGVSZXZpZXdMb2FkTW9yZVBvc3RzTmV4dCgpICk7XHJcblxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLyoqXHJcblx0XHQgKiBMb2FkIG1vcmUgcG9zdHMuXHJcblx0XHQgKlxyXG5cdFx0ICogMS5NYWtlIGFuIGFqYXggcmVxdWVzdCwgYnkgaW5jcmVtZW50aW5nIHRoZSBwYWdlIG5vLiBieSBvbmUgb24gZWFjaCByZXF1ZXN0LlxyXG5cdFx0ICogMi5BcHBlbmQgbmV3L21vcmUgcG9zdHMgdG8gdGhlIGV4aXN0aW5nIGNvbnRlbnQuXHJcblx0XHQgKlxyXG5cdFx0ICogQHJldHVybiBudWxsXHJcbiAgICAgICAgICovIFxyXG4gICAgICAgIGhhbmRsZVJldmlld0xvYWRNb3JlUG9zdHNQcmV2KCkge1xyXG5cclxuICAgICAgICAgICAgY29uc3QgcGFnZSA9IHRoaXMubG9hZE1vcmVCdG5QcmV2LmRhdGEoICdwYWdlJyApO1xyXG5cclxuICAgICAgICAgICAgaWYgKCAhIHBhZ2UgKSB7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gbnVsbDtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgY29uc3QgcHJldlBhZ2UgPSBwYXJzZUludCggcGFnZSApIC0gMTtcclxuXHJcbiAgICAgICAgICAgICQuYWpheCgge1xyXG4gICAgICAgICAgICAgICAgdXJsOiB0aGlzLmFqYXhVcmwsXHJcbiAgICAgICAgICAgICAgICB0eXBlOiAncG9zdCcsXHJcbiAgICAgICAgICAgICAgICBkYXRhOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgcGFnZTogcHJldlBhZ2UsXHJcbiAgICAgICAgICAgICAgICAgICAgYWN0aW9uOiAncmV2aWV3X2xvYWRfbW9yZScsXHJcbiAgICAgICAgICAgICAgICAgICAgYWpheF9ub25jZTogdGhpcy5hamF4Tm9uY2UsXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgc3VjY2VzczogKCByZXNwb25zZSApID0+IHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoIDAgPT09IHBhcnNlSW50KCByZXNwb25zZSApICkge1xyXG5cclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkKCAnLnJldmlld3Nfc2xpZGVyJyApLmVtcHR5KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQoICcucmV2aWV3c19zbGlkZXInKS5hcHBlbmQoIHJlc3BvbnNlICk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubG9hZE1vcmVCdG5OZXh0LmRhdGEoICdwYWdlJywgcGFnZSApO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0aGlzLmxvYWRNb3JlQnRuUHJldi5kYXRhKCAncGFnZScsIHByZXZQYWdlICk7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIGVycm9yOiAoIHJlc3BvbnNlICkgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCByZXNwb25zZSApO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuXHJcbiAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIC8qKlxyXG5cdFx0ICogTG9hZCBtb3JlIHBvc3RzLlxyXG5cdFx0ICpcclxuXHRcdCAqIDEuTWFrZSBhbiBhamF4IHJlcXVlc3QsIGJ5IGluY3JlbWVudGluZyB0aGUgcGFnZSBuby4gYnkgb25lIG9uIGVhY2ggcmVxdWVzdC5cclxuXHRcdCAqIDIuQXBwZW5kIG5ldy9tb3JlIHBvc3RzIHRvIHRoZSBleGlzdGluZyBjb250ZW50LlxyXG5cdFx0ICpcclxuXHRcdCAqIEByZXR1cm4gbnVsbFxyXG4gICAgICAgICAqLyBcclxuICAgICAgICBoYW5kbGVSZXZpZXdMb2FkTW9yZVBvc3RzTmV4dCgpIHtcclxuXHJcbiAgICAgICAgICAgIGNvbnN0IHBhZ2UgPSB0aGlzLmxvYWRNb3JlQnRuTmV4dC5kYXRhKCAncGFnZScgKTtcclxuXHJcbiAgICAgICAgICAgIGlmICggISBwYWdlICkge1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIG51bGw7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGNvbnN0IG5leHRQYWdlID0gcGFyc2VJbnQoIHBhZ2UgKSArIDE7XHJcbiAgICAgICAgICBcclxuXHJcbiAgICAgICAgICAgICQuYWpheCgge1xyXG4gICAgICAgICAgICAgICAgdXJsOiB0aGlzLmFqYXhVcmwsXHJcbiAgICAgICAgICAgICAgICB0eXBlOiAncG9zdCcsXHJcbiAgICAgICAgICAgICAgICBkYXRhOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgcGFnZTogcGFnZSxcclxuICAgICAgICAgICAgICAgICAgICBhY3Rpb246ICdyZXZpZXdfbG9hZF9tb3JlJyxcclxuICAgICAgICAgICAgICAgICAgICBhamF4X25vbmNlOiB0aGlzLmFqYXhOb25jZSxcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBzdWNjZXNzOiAoIHJlc3BvbnNlICkgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICggMCA9PT0gcGFyc2VJbnQoIHJlc3BvbnNlICkgKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCcxMjMnKTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkKCAnLnJldmlld3Nfc2xpZGVyJyApLmVtcHR5KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQoICcucmV2aWV3c19zbGlkZXIgJykuYXBwZW5kKCByZXNwb25zZSApO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0aGlzLmxvYWRNb3JlQnRuUHJldi5kYXRhKCAncGFnZScsIHBhZ2UgKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5sb2FkTW9yZUJ0bk5leHQuZGF0YSggJ3BhZ2UnLCBuZXh0UGFnZSApO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBlcnJvcjogKCByZXNwb25zZSApID0+IHtcclxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyggcmVzcG9uc2UgKTtcclxuICAgICAgICAgICAgICAgIH0sXHJcblxyXG4gICAgICAgICAgICAgfSk7XHJcblxyXG5cclxuICAgICAgICB9XHJcblxyXG4gICAgfVxyXG5cclxuICAgIG5ldyBSZXZpZXdMb2FkTW9yZSgpO1xyXG5cclxufSApKCBkb2N1bWVudCApOyJdfQ==
