SELECT 
activities.title, 
COUNT(DISTINCT activity_details.type) as total_activity_type,
SUM(activity_details.weight) as total_weight


from activities 
left JOIN activity_details 
on activities.id = activity_details.id_activity
GROUP by(activities.title);