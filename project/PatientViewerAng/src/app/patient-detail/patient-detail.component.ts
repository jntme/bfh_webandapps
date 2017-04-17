import { Component, Input, OnInit } from '@angular/core';

import { Location }                 from '@angular/common';
import { ActivatedRoute, Params } from "@angular/router";
import { PatientService } from "app/patient.service";
import 'rxjs/add/operator/switchMap';

import { Patient } from '../patient';
@Component({
  selector: 'patient-detail',
  templateUrl: './patient-detail.component.html',
  styleUrls: ['./patient-detail.component.css']
})
export class PatientDetailComponent implements OnInit {
  @Input() patient: Patient;

  constructor(
    private patientService: PatientService,
    private route: ActivatedRoute,
    private location: Location
  ) { }

  ngOnInit() : void {
    this.route.params
      .switchMap((params: Params) => this.patientService.getPatient(+params['pid']))
      .subscribe(patient => this.patient = patient);
  }

  goBack() :void {
    this.location.back();
  }

  save() : void {
    this.patientService.update(this.patient)
      .then(() => this.goBack());
  }

}
