var sessionDetails = {
  nimesh: {
    title: "Profit. Grow. Win. Amplify your CSP business with the Ingram Micro Ecosystem of Cloud.",
    body: "Join Nimesh Dave, EVP and Head of Ingram Micro Cloud, as he discusses the pathways to success, profit and winning in the exploding cloud economy. Whether a 2-Tier, 1-Tier, syndication partner, established global company, or just getting started in cloud, learn how to empower a profitable Microsoft CSP business with Ingram Micro's Ecosystem of Cloud&mdash;the most comprehensive portfolio of platforms, cloud services catalog, multi-partner channels, and business transformation tools."
  },
  todd: {
    title: "Fire up your Microsoft CSP Business with a Modern Customer Experience and a Comprehensive Ecosystem",
    body: "Envision a strong portfolio of in-demand services centered around Microsoft's highly demanded CSP offer and fully integrated with your choice of cloud service delivery platform. Join Todd Carter, Odin's Platform Evangelist, and learn how to realize that vision and deliver differentiated services to get ahead of the competition."
  },
  gabriel: {
    title: "Ingram Micro Cloud: The Platforms and Programs for Microsoft CSP Success",
    body: "With today's voracious and increasing demand for cloud services, success hinges on speed to market, flexibility, and building profitable strategic partnerships. Watch Gabriel Balo, Global Marketplace Evangelist, show how Ingram Micro can help solution partners leverage the platforms and programs in Ingram Micro's Ecosystem of Cloud to build and sustain dynamic cloud businesses."
  },
  renee: {
    title: "Microsoft Breakout",
    body: "Join Morgan Wheaton who will present on partner profitability. CSP will be presented as the way that partners can take advantage of the cloud opportunity to drive repeatable revenue and profits: how the programs works with an emphasis on the support requirements, the differences between the Indirect and Direct models, and the keys to success. Renee Bergeron will come on stage to discuss Ingram's partner success story."
  }
};



jQuery(function ($) {
  $( "#panel6 .speaker, #panel6 .speaker-condensed" ).mouseenter(function(evt) {
    $('#panel6 .speaker, #panel6 .speaker-condensed' ).removeClass('highlight');
    var speaker = evt.target.id;
    $('#panel6 .session-content h3').text(sessionDetails[speaker].title);
    $('#panel6 .session-content p').text(sessionDetails[speaker].body);
    $(this).addClass('highlight');
  });
});