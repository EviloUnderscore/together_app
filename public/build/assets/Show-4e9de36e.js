import{_ as c}from"./AppLayout-7021bb1a.js";import p from"./DeleteUserForm-44727888.js";import l from"./LogoutOtherBrowserSessionsForm-8b68b60b.js";import{S as s}from"./SectionBorder-509ea49a.js";import f from"./TwoFactorAuthenticationForm-d71dd424.js";import u from"./UpdatePasswordForm-4c92cf12.js";import _ from"./UpdateProfileInformationForm-a64a2cd7.js";import{c as d,w as n,o,a as i,e as r,b as t,f as a,F as h}from"./app-aadbb1de.js";import"./DialogModal-9ee64b88.js";import"./SectionTitle-2158e370.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DangerButton-b8be06c7.js";import"./TextInput-5b9274c0.js";import"./SecondaryButton-1be25cdd.js";import"./ActionMessage-0232f525.js";import"./PrimaryButton-2bdb9093.js";import"./InputLabel-094911d1.js";import"./FormSection-eec8bc6f.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};