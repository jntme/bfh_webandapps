import { Component, OnInit } from '@angular/core';
import { Patient } from "app/patient";
import { PatientService } from "app/patient.service";
import { Router } from "@angular/router";

@Component({
  selector: 'patients',
  templateUrl: './patients.component.html',
  styleUrls: ['./patients.component.css']
})
export class PatientsComponent implements OnInit {

  patients: Patient[];
  selectedPatient: Patient;

  constructor(
    private patientService: PatientService,
    private router: Router
    ) {};

  ngOnInit(): void {
    this.getPatients();
  }

  getPatients(): void {
    this.patientService.getPatients().then(patients => this.patients = patients);
    // this.patients = this.patientService.getPatients();
  }

  onSelect(patient: Patient): void {
   this.selectedPatient = patient; 
  }

  goToDetail(patientId: number): void {
    this.router.navigate(['/detail', patientId]);
  }

  add(name: string): void {
    name = name.trim();
    if (!name) {return ;}
    this.patientService.create(name)
      .then(patient => {
        this.patients.push(patient);
        this.selectedPatient = null;
      });
  }

  delete(patient: Patient) : void {
    this.patientService
      .delete(patient.id)
      .then(() => {
            this.patients = this.patients.filter(h => h !== patient);
            if(this.selectedPatient === patient) {this.selectedPatient = null; }
      });
  }
}
