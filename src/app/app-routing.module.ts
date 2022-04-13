import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeOneComponent } from './components/pages/home-one/home-one.component';
import { HomeTwoComponent } from './components/pages/home-two/home-two.component';
import { HomeThreeComponent } from './components/pages/home-three/home-three.component';
import { HomeFourComponent } from './components/pages/home-four/home-four.component';
import { HomeFiveComponent } from './components/pages/home-five/home-five.component';
import { HomeSixComponent } from './components/pages/home-six/home-six.component';
import { HomeSevenComponent } from './components/pages/home-seven/home-seven.component';
import { HomeEightComponent } from './components/pages/home-eight/home-eight.component';
import { ContactComponent } from './components/pages/contact/contact.component';
import { BlogRightSidebarComponent } from './components/pages/blog-right-sidebar/blog-right-sidebar.component';
import { BlogDetailsComponent } from './components/pages/blog-details/blog-details.component';
import { BlogGridComponent } from './components/pages/blog-grid/blog-grid.component';
import { ComingSoonComponent } from './components/pages/coming-soon/coming-soon.component';
import { ErrorComponent } from './components/pages/error/error.component';
import { PrivacyPolicyComponent } from './components/pages/privacy-policy/privacy-policy.component';
import { TermsConditionsComponent } from './components/pages/terms-conditions/terms-conditions.component';
import { LogInComponent } from './components/pages/log-in/log-in.component';
import { SignUpComponent } from './components/pages/sign-up/sign-up.component';
import { FaqComponent } from './components/pages/faq/faq.component';
import { PricingComponent } from './components/pages/pricing/pricing.component';
import { TeamComponent } from './components/pages/team/team.component';
import { ProjectsDetailsComponent } from './components/pages/projects-details/projects-details.component';
import { ProjectsTwoComponent } from './components/pages/projects-two/projects-two.component';
import { ProjectsOneComponent } from './components/pages/projects-one/projects-one.component';
import { ServicesDetailsComponent } from './components/pages/services-details/services-details.component';
import { ServicesTwoComponent } from './components/pages/services-two/services-two.component';
import { ServicesOneComponent } from './components/pages/services-one/services-one.component';
import { AboutComponent } from './components/pages/about/about.component';
import { DisclaimerComponent } from './components/pages/disclaimer/disclaimer.component';
import { EnterpriseComponent } from './components/pages/enterprise/enterprise.component';
import { SystemsComponent } from './components/pages/systems/systems.component';
import { IndustryComponent } from './components/pages/industry/industry.component';
import { OurValuesComponent } from './components/pages/about/our-values/our-values.component';
import { AdvantagesComponent } from './components/pages/about/advantages/advantages.component';
import { ExecutiveTeamComponent } from './components/pages/about/executiveteam/executive.component';
import { EngagementsComponent } from './components/pages/about/engagements/engagements.component';
import { CredentialsComponent } from './components/pages/about/credentials/credentials.component';
import { EbusinessComponent } from './components/pages/enterprise/ebusiness/ebusiness.component';
import { WirelessComponent } from './components/pages/enterprise/wireless/wireless.component';
import { SfttestingComponent } from './components/pages/enterprise/sfttesting/sfttesting.component';
import { MainframeComponent } from './components/pages/enterprise/mainframe/mainframe.component';
import { ReengineeringComponent } from './components/pages/enterprise/reengineering/reengineering.component';
import { TechdocComponent } from './components/pages/enterprise/techdoc/techdoc.component';
import { StorageComponent } from './components/pages/systems/storage/storage.component';
import { EmbeddedComponent } from './components/pages/systems/embedded/embedded.component';
import { ValidationComponent } from './components/pages/systems/validation/validation.component';
import { HealthcareComponent } from './components/pages/industry/healthcare/healthcare.component';
import { BankingComponent } from './components/pages/industry/banking/banking.component';
import { GovtComponent } from './components/pages/industry/govt/govt.component';
import { EnergyComponent } from './components/pages/industry/energy/energy.component';
import { RetailComponent } from './components/pages/industry/retail/retail.component';
import { ProductsComponent } from './components/pages/products/products.component';
import { ErpconstructComponent } from './components/pages/products/erpconstruct/erpconstruct.component';
import { FinedealComponent } from './components/pages/products/finedeal/finedeal.component';
import { EnergitComponent } from './components/pages/products/energit/energit.component';
import { PartnerComponent } from './components/pages/partner/partner.component';
import { IbmComponent } from './components/pages/partner/ibm/ibm.component';
import { HpComponent } from './components/pages/partner/hp/hp.component';
import { BorlandComponent } from './components/pages/partner/borland/borland.component';
import { MicrosoftComponent } from './components/pages/partner/microsoft/microsoft.component';
import { OracleComponent } from './components/pages/partner/oracle/oracle.component';
import { SuccessComponent } from './components/pages/Insights/success/success.component';
import { NewsComponent } from './components/pages/Insights/news/news.component';
import { CareersComponent } from './components/pages/careers/careers.component';
import { OpeningsComponent } from './components/pages/careers/openings/openings.component';
import { OverviewComponent } from './components/pages/overview/overview.component';

const routes: Routes = [
    { path: '', component: HomeThreeComponent },
    { path: 'home-two', component: HomeTwoComponent },
    { path: 'home-three', component: HomeThreeComponent },
    // { path: 'home-four', component: HomeFourComponent },
    { path: 'home-five', component: HomeFiveComponent },
    // { path: 'home-six', component: HomeSixComponent },
    { path: 'home-seven', component: HomeSevenComponent },
    // { path: 'home-eight', component: HomeEightComponent },
    { path: 'about', component: AboutComponent },
    { path: 'enterprise', component: EnterpriseComponent },
    { path: 'systems', component: SystemsComponent },
    { path: 'industry', component: IndustryComponent },
    { path: 'services-one', component: ServicesOneComponent },
    { path: 'services-two', component: ServicesTwoComponent },
    { path: 'services-details', component: ServicesDetailsComponent },
    { path: 'projects-one', component: ProjectsOneComponent },
    { path: 'projects-two', component: ProjectsTwoComponent },
    { path: 'projects-details', component: ProjectsDetailsComponent },
    { path: 'team', component: TeamComponent },
    { path: 'pricing', component: PricingComponent },
    { path: 'faq', component: FaqComponent },
    { path: 'log-in', component: LogInComponent },
    { path: 'sign-up', component: SignUpComponent },
    { path: 'terms-conditions', component: TermsConditionsComponent },
    { path: 'privacy-policy', component: PrivacyPolicyComponent },
    { path: 'error', component: ErrorComponent },
    { path: 'coming-soon', component: ComingSoonComponent },
    { path: 'blog-grid', component: BlogGridComponent },
    { path: 'blog-right-sidebar', component: BlogRightSidebarComponent },
    { path: 'blog-details', component: BlogDetailsComponent },
    { path: 'contact', component: ContactComponent },
    { path: 'disclaimer', component: DisclaimerComponent },
    // Here add new pages component
    { path: 'ourvalues', component: OurValuesComponent },
    { path: 'adavantages', component: AdvantagesComponent },
    { path: 'executives', component: ExecutiveTeamComponent },
    { path: 'engagements', component: EngagementsComponent },
    { path: 'credentials', component: CredentialsComponent },

    { path: 'ebusiness', component: EbusinessComponent },
    { path: 'wireless', component: WirelessComponent },
    { path: 'sfttesting', component: SfttestingComponent },
    { path: 'mainframe', component: MainframeComponent },
    { path: 'reeng', component: ReengineeringComponent },
    { path: 'techdoc', component: TechdocComponent },
    { path: 'storage', component: StorageComponent },
    { path: 'embedded', component: EmbeddedComponent },
    { path: 'validation', component: ValidationComponent },

    { path: 'healthcare', component: HealthcareComponent },
    { path: 'banking', component: BankingComponent },
    { path: 'govt', component: GovtComponent },
    { path: 'energy', component: EnergyComponent },
    { path: 'retail', component: RetailComponent },
    { path: 'product', component: ProductsComponent },
    { path: 'erpc', component: ErpconstructComponent },
    { path: 'finedeal', component: FinedealComponent },
    { path: 'energit', component: EnergitComponent },

    { path: 'magic', component: PartnerComponent },
    { path: 'ibm', component: IbmComponent },
    { path: 'hp', component: HpComponent },
    { path: 'borland', component: BorlandComponent },
    { path: 'microsoft', component: MicrosoftComponent },
    { path: 'oracle', component: OracleComponent },
    { path: 'success', component: SuccessComponent },
    { path: 'news', component: NewsComponent },
    { path: 'careers', component: CareersComponent},
    { path: 'openings', component: OpeningsComponent},
    { path: 'overview', component: OverviewComponent},

    { path: '**', component: ErrorComponent } // This line will remain down from the whole pages component list
];

@NgModule({
    imports: [RouterModule.forRoot(routes, { relativeLinkResolution: 'legacy' })],
    exports: [RouterModule]
})
export class AppRoutingModule { }