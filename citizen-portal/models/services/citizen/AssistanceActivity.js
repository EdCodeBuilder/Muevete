import { Model } from '@/models/Model'
import { Api } from '@/models/Api'

const formData = {
  id: null,
  activity_id: null,
  date: null,
  stage: null,
  activity_name: null,
  content: null,
  start_time: null,
  end_time: null,
  created_at: null,
  updated_at: null,
}

export class AssistanceActivity extends Model {
  constructor(data = formData) {
    super(Api.END_POINTS.CITIZEN_ACTIVITIES(), data)
  }

  clone(data = formData) {
    return new AssistanceActivity(data)
  }
}
