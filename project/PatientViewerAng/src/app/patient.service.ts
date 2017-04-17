import { Injectable } from '@angular/core';

import { Patient } from "app/patient";
import { Http } from "@angular/http";

import 'rxjs/add/operator/toPromise';

@Injectable()
export class PatientService {

  private patientsUrl = 'api/heroes'; //URL to web api

  constructor(private http: Http) { }

  getPatient(pid: number): Promise<Patient> {

    const url = `${this.patientsUrl}/${pid}`;
    console.log(url);
    return this.http.get(url)
               .toPromise()
               .then(response => response.json().data as Patient)
               .catch(error => this.handleError(this));

    // return this.getPatients()
    //            .then(patients => patients.find(patient => patient.pid === pid));

  }

  getPatients(): Promise<Patient[]> {
    console.log(this.patientsUrl);
    return this.http.get(this.patientsUrl)
               .toPromise()
               .then(response => response.json().data as Patient[])
               .catch(this.handleError);
  }
  
  private handleError(error: any): Promise<any> {
    console.error('An error occurred', error); // for demo purposes only
    return Promise.reject(error.message || error);
  }

  getPatientsSlowly(): Promise<Patient[]> {
    return new Promise(resolve => {
      setTimeout(() => resolve(this.getPatients()), 2000);
    });
  }


}

