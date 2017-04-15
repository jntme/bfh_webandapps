import { NgModule } from '@angular/core';
import { Routes, RouterModule } from "@angular/router";

import { PatientsComponent } from "app/patients/patients.component";
import { DashboardComponent } from "app/dashboard/dashboard.component";
import { PatientDetailComponent } from "app/patient-detail/patient-detail.component";


const routes: Routes = [
      {
        path: 'patients',
        component: PatientsComponent
      },
      {
        path: 'dashboard',
        component: DashboardComponent
      },
      {
        path: 'detail/:pid',
        component: PatientDetailComponent
      },
      {
        path: '',
        redirectTo: '/dashboard',
        pathMatch: 'full'
      }
    ];

@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports : [ RouterModule ]
})
export class AppRoutingModule { }
