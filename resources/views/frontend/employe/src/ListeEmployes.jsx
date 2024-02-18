import axios from "axios"
import { useEffect, useState } from "react"
import ArrowCircleRightIcon from '@mui/icons-material/ArrowCircleRight';
const Employes = () => {
  const [employes, setEmployes] = useState([])
  const [Ishover, setIshover] = useState(false)
  useEffect(() => {


    axios.get(`http://localhost:8000/api/employes`).then(res => setEmployes(res.data))
  }, [])
  console.log(employes);
  return (

    <div>

      <h2 className="text-decoration-underline text-primary">La liste des Employés</h2>

      <div className="conatiner">
        <div className="cards border border-2 p-5 bg-info rounded-3 d-flex gap-3 justify-content-center">
          {
            employes.map((val, key) => (
              <div className="card col-3 m-2 p-4" key={key}>


                <div className=" p-0 h-50 profile-image">
                  <img className="w-75 h-75 rounded-circle" src={`http://127.0.0.1:8000/images_Emplyes/${val.Photo}`} alt="" />
                </div>
                <div className="card-body text-dark text">

                  <h5 className="text-dark">{val.nom}</h5>
                  <div className="flip-card-front">
                    <li >Matricule : {val.Matricule}</li>
                    <ul>

                      <li>Date Récrutement :{val.DateRecrutement}</li>
                      <li>{val.Adresse}</li>
                    </ul>
                    <div className=" h-5">
                      <ArrowCircleRightIcon sx={{ fontSize: 40 }} color="primary" />
                    </div>
                  </div>
                </div>
                <div className="card-back d-none ">
                  <ul className="text-dark">
                  {

                    val.postes.length ?
                      val.postes.map((v, k) => (

                        val.Matricule === v.pivot.employe_Matricule && (
                          <li>{v.Description}</li>

                        )




                      )) : <strong className="text-danger">"Aucune poste affecter pour le moment"</strong>
                  }
                  </ul>

                </div>
              </div>


            ))
          }

        </div>
      </div>

    </div>
  )
}

export default Employes
