import { Injectable } from '@angular/core';

import { Patient } from "app/patient";
import { PATIENTS } from "./mock-patients";



@Injectable()
export class PatientService {

  constructor() { }

  getPatients(): Promise<Patient[]> {
    return Promise.resolve(PATIENTS);
  }

  getPatientsSlowly(): Promise<Patient[]> {
    return new Promise(resolve => {
      setTimeout(() => resolve(this.getPatients()), 2000);
    });
  }


}

